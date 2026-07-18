<?php

namespace App\Services;

use App\Mail\OrderConfirmation;
use App\Mail\OrderNotification;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * Sends the customer confirmation and admin notification emails for an order.
 *
 * Shared by the order-creation flow (card/cod, sent immediately) and the LiqPay
 * callback (liqpay, sent once payment is confirmed). Failures are logged, never
 * thrown — email must not break order creation or the payment callback.
 */
class OrderNotifier
{
    public function send(Order $order): void
    {
        try {
            if ($order->email) {
                Mail::to($order->email)->send(new OrderConfirmation($order));
            }
            if ($adminEmail = config('mail.admin_email')) {
                Mail::to($adminEmail)->send(new OrderNotification($order));
            }
        } catch (\Throwable $e) {
            Log::error('Mail send failed: '.$e->getMessage());
        }
    }
}
