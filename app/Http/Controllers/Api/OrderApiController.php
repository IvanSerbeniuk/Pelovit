<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PromoCode;
use App\Services\LiqPayService;
use App\Services\OrderNotifier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderApiController extends Controller
{
    private const COD_FEE = 20;

    public function store(Request $request, LiqPayService $liqpay, OrderNotifier $notifier): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'city' => 'required|string|max:255',
            'branch' => 'required|string|max:255',
            'payment_method' => 'required|in:card,cod,liqpay',
            'comment' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|integer',
            'items.*.name' => 'required|string',
            'items.*.price' => 'required|numeric',
            'items.*.qty' => 'required|integer|min:1',
            'promo_code' => 'nullable|string|max:64',
        ]);

        // LiqPay must be configured before it can be offered; otherwise the
        // customer would be redirected to a broken checkout with an empty key.
        if ($validated['payment_method'] === 'liqpay' && ! config('services.liqpay.public_key')) {
            throw ValidationException::withMessages([
                'payment_method' => ['Онлайн-оплата тимчасово недоступна. Оберіть інший спосіб оплати.'],
            ]);
        }

        // Recompute money server-side; never trust a client-supplied total.
        $subtotal = collect($validated['items'])
            ->sum(fn ($item) => (float) $item['price'] * (int) $item['qty']);
        $codFee = $validated['payment_method'] === 'cod' ? self::COD_FEE : 0;

        $order = DB::transaction(function () use ($validated, $subtotal, $codFee) {
            $discount = 0.0;
            $appliedCode = null;

            if (! empty($validated['promo_code'])) {
                $promo = PromoCode::active()
                    ->whereRaw('UPPER(code) = ?', [strtoupper(trim($validated['promo_code']))])
                    ->lockForUpdate()
                    ->first();

                $error = $promo
                    ? $promo->validationError($subtotal)
                    : 'Промокод недійсний';

                if ($error) {
                    throw ValidationException::withMessages(['promo_code' => [$error]]);
                }

                $discount = $promo->discountFor($subtotal);
                $appliedCode = $promo->code;
                $promo->increment('used_count');
            }

            $total = max(0, $subtotal - $discount) + $codFee;

            return Order::create([
                ...$validated,
                'items' => $validated['items'],
                'discount' => $discount,
                'promo_code' => $appliedCode,
                'total' => $total,
            ]);
        });

        // For online LiqPay payment the order is not paid yet: defer the
        // confirmation emails to the payment callback and hand the checkout
        // payload back to the client so it can redirect to LiqPay.
        if ($order->payment_method === 'liqpay') {
            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'liqpay' => $liqpay->checkoutData($order),
            ], 201);
        }

        $notifier->send($order);

        return response()->json(['success' => true, 'order_id' => $order->id], 201);
    }
}
