<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\LiqPayService;
use App\Services\OrderNotifier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class LiqPayCallbackController extends Controller
{
    // LiqPay statuses that mean the money has been received.
    private const PAID_STATUSES = ['success', 'sandbox', 'wait_compensation', 'subscribed'];

    // LiqPay statuses that mean the payment will not complete.
    private const FAILED_STATUSES = ['failure', 'error', 'reversed', 'expired'];

    public function handle(Request $request, LiqPayService $liqpay, OrderNotifier $notifier): Response
    {
        $payload = $liqpay->verifyCallback(
            (string) $request->input('data'),
            (string) $request->input('signature'),
        );

        // Invalid or missing signature — the request is not genuinely from LiqPay.
        if ($payload === null) {
            Log::warning('LiqPay callback rejected: signature mismatch');

            return response('invalid signature', 400);
        }

        $orderId = $liqpay->orderIdFromReference((string) ($payload['order_id'] ?? ''));
        $order = $orderId ? Order::find($orderId) : null;

        if (! $order) {
            Log::warning('LiqPay callback for unknown order: '.($payload['order_id'] ?? '—'));

            return response('ok', 200);
        }

        // Idempotent: ignore repeated callbacks once the order is already paid.
        if ($order->payment_status === 'paid') {
            return response('ok', 200);
        }

        $status = (string) ($payload['status'] ?? '');

        if (in_array($status, self::PAID_STATUSES, true)) {
            $order->update([
                'payment_status' => 'paid',
                'payment_id' => (string) ($payload['payment_id'] ?? $payload['transaction_id'] ?? ''),
                'status' => 'confirmed',
            ]);
            $notifier->send($order);
        } elseif (in_array($status, self::FAILED_STATUSES, true)) {
            $order->update([
                'payment_status' => 'failed',
                'payment_id' => (string) ($payload['payment_id'] ?? $payload['transaction_id'] ?? ''),
            ]);
        }
        // Any other status (e.g. wait_accept, processing) — leave as pending.

        return response('ok', 200);
    }
}
