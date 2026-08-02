<?php

namespace App\Services;

use App\Models\Order;

/**
 * Minimal LiqPay Client-Server API (v3) helper.
 *
 * Builds the `data` + `signature` pair for the checkout form and verifies the
 * signature of incoming server callbacks. No SDK required — the protocol is just
 * base64(json) for the payload and base64(sha1(private + data + private)) for the
 * signature. Keys are read from config/services.php (never from public settings).
 */
class LiqPayService
{
    public const CHECKOUT_URL = 'https://www.liqpay.ua/api/3/checkout';

    /**
     * Deep link scheme registered by the Capacitor app.
     */
    public const APP_SCHEME = 'pelovit://';

    /**
     * Build the checkout payload for an order.
     *
     * When $forApp is true the result_url points at the app's deep link instead
     * of the website, so the external browser hands control back to the app
     * after payment rather than leaving the user on a web page.
     *
     * @return array{action_url: string, data: string, signature: string}
     */
    public function checkoutData(Order $order, bool $forApp = false): array
    {
        $params = [
            'public_key' => (string) config('services.liqpay.public_key'),
            'version' => 3,
            'action' => 'pay',
            'amount' => (float) $order->total,
            'currency' => 'UAH',
            'description' => "Замовлення №{$order->id} — PELOVIT-R",
            'order_id' => $this->orderReference($order),
            'server_url' => rtrim((string) config('app.url'), '/').'/api/liqpay/callback',
            'result_url' => $forApp
                ? self::APP_SCHEME."order/success?payment_method=liqpay&order_id={$order->id}"
                : rtrim((string) config('app.frontend_url'), '/')
                    ."/order/success?payment_method=liqpay&order_id={$order->id}",
            'sandbox' => config('services.liqpay.sandbox') ? 1 : 0,
        ];

        $data = base64_encode(json_encode($params, JSON_UNESCAPED_UNICODE));

        return [
            'action_url' => self::CHECKOUT_URL,
            'data' => $data,
            'signature' => $this->sign($data),
        ];
    }

    /**
     * Verify a callback signature and return the decoded payload, or null if the
     * signature does not match (i.e. the request is not genuinely from LiqPay).
     *
     * @return array<string, mixed>|null
     */
    public function verifyCallback(string $data, string $signature): ?array
    {
        if ($data === '' || $signature === '' || ! hash_equals($this->sign($data), $signature)) {
            return null;
        }

        $decoded = json_decode(base64_decode($data), true);

        return is_array($decoded) ? $decoded : null;
    }

    /**
     * Stable external reference sent to LiqPay as order_id.
     */
    public function orderReference(Order $order): string
    {
        return "PELOVIT-{$order->id}";
    }

    /**
     * Extract the numeric order id back from a LiqPay order_id reference.
     */
    public function orderIdFromReference(string $reference): ?int
    {
        return preg_match('/^PELOVIT-(\d+)$/', $reference, $m) ? (int) $m[1] : null;
    }

    private function sign(string $data): string
    {
        $private = (string) config('services.liqpay.private_key');

        return base64_encode(sha1($private.$data.$private, true));
    }
}
