<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

/**
 * Публічний статус замовлення за одноразовим токеном із листа.
 *
 * Замість реєстрації та паролів: токен знає лише той, кому прийшов лист.
 * Токен випадковий (48 символів), тож перебрати його неможливо, а throttle
 * на маршруті прибирає навіть теоретичну спробу.
 */
class OrderTrackController extends Controller
{
    public function show(string $token): JsonResponse
    {
        $order = Order::where('track_token', $token)->first();

        if (! $order) {
            return response()->json(['message' => 'Замовлення не знайдено'], 404);
        }

        return response()->json([
            'id' => $order->id,
            'created_at' => $order->created_at->toIso8601String(),
            'first_name' => $order->first_name,
            'last_name' => $order->last_name,
            'phone' => $order->phone,
            'city' => $order->city,
            'branch' => $order->branch,
            'comment' => $order->comment,
            'items' => $order->items,
            'total' => (float) $order->total,
            'discount' => (float) $order->discount,
            'promo_code' => $order->promo_code,
            'payment_method' => $order->payment_method,
            'status' => $order->status,
            'status_label' => $order->statusLabel(),
            'payment_status' => $order->payment_status,
            'payment_status_label' => $order->paymentStatusLabel(),
        ]);
    }
}
