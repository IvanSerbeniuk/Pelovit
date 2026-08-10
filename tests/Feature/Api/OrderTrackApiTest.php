<?php

namespace Tests\Feature\Api;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTrackApiTest extends TestCase
{
    use RefreshDatabase;

    private function makeOrder(array $overrides = []): Order
    {
        return Order::create(array_merge([
            'first_name' => 'Оксана',
            'last_name' => 'Коваль',
            'phone' => '+380671112233',
            'email' => 'buyer@example.com',
            'city' => 'Київ',
            'branch' => 'Відділення №5',
            'payment_method' => 'cod',
            'items' => [['id' => 1, 'name' => 'Крем', 'price' => 300, 'qty' => 2]],
            'total' => 620,
            'discount' => 0,
            'status' => 'shipped',
            'payment_status' => 'pending',
        ], $overrides));
    }

    public function test_returns_order_by_track_token(): void
    {
        $order = $this->makeOrder();

        $this->getJson("/api/orders/track/{$order->track_token}")
            ->assertOk()
            ->assertJsonPath('id', $order->id)
            ->assertJsonPath('status', 'shipped')
            ->assertJsonPath('status_label', 'Відправлено')
            ->assertJsonPath('payment_status_label', 'Очікує оплати')
            ->assertJsonPath('items.0.name', 'Крем');
    }

    public function test_unknown_token_returns_404(): void
    {
        $this->makeOrder();

        $this->getJson('/api/orders/track/'.str_repeat('x', 48))
            ->assertNotFound();
    }

    public function test_token_is_generated_and_unique(): void
    {
        $first = $this->makeOrder();
        $second = $this->makeOrder();

        $this->assertNotEmpty($first->track_token);
        $this->assertNotSame($first->track_token, $second->track_token);
    }

    /**
     * Токен — єдиний ключ до чужих персональних даних, тож він не має
     * прийматися ззовні під час створення замовлення.
     */
    public function test_track_token_cannot_be_mass_assigned(): void
    {
        $order = $this->makeOrder(['track_token' => 'attacker-chosen-token']);

        $this->assertNotSame('attacker-chosen-token', $order->track_token);
    }

    public function test_track_url_points_to_storefront(): void
    {
        config(['app.frontend_url' => 'https://example.com/']);
        $order = $this->makeOrder();

        $this->assertSame(
            "https://example.com/order/track?token={$order->track_token}",
            $order->trackUrl(),
        );
    }
}
