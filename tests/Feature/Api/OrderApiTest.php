<?php

namespace Tests\Feature\Api;

use App\Mail\OrderConfirmation;
use App\Models\Order;
use App\Models\PromoCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    use RefreshDatabase;

    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'first_name' => 'Іван',
            'last_name' => 'Петренко',
            'phone' => '+380631234567',
            'email' => 'test@example.com',
            'city' => 'Одеса',
            'branch' => '5',
            'payment_method' => 'card',
            'comment' => null,
            'items' => [
                ['id' => 1, 'name' => 'Крем', 'price' => 199.00, 'qty' => 2],
            ],
            'total' => 398.00,
        ], $overrides);
    }

    public function test_creates_order_with_valid_data(): void
    {
        Mail::fake();

        $this->postJson('/api/orders', $this->validPayload())
            ->assertCreated()
            ->assertJsonFragment(['success' => true]);

        $this->assertDatabaseCount('orders', 1);
        $this->assertDatabaseHas('orders', ['first_name' => 'Іван', 'phone' => '+380631234567']);
    }

    public function test_returns_order_id_on_success(): void
    {
        Mail::fake();

        $response = $this->postJson('/api/orders', $this->validPayload());

        $response->assertCreated()->assertJsonStructure(['success', 'order_id']);
        $this->assertEquals(Order::first()->id, $response->json('order_id'));
    }

    public function test_validation_fails_without_required_fields(): void
    {
        $this->postJson('/api/orders', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['first_name', 'last_name', 'phone', 'payment_method', 'items']);
    }

    public function test_validation_fails_with_invalid_payment_method(): void
    {
        $this->postJson('/api/orders', $this->validPayload(['payment_method' => 'bitcoin']))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['payment_method']);
    }

    public function test_validation_fails_with_empty_items(): void
    {
        $this->postJson('/api/orders', $this->validPayload(['items' => []]))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['items']);
    }

    public function test_email_is_required(): void
    {
        Mail::fake();

        $this->postJson('/api/orders', $this->validPayload(['email' => null]))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['email']);
    }

    public function test_sends_confirmation_mail_when_email_provided(): void
    {
        Mail::fake();

        $this->postJson('/api/orders', $this->validPayload(['email' => 'buyer@example.com']));

        Mail::assertSent(OrderConfirmation::class, fn ($m) => $m->hasTo('buyer@example.com'));
    }

    /**
     * Місток сумісності зі старими APK, зібраними до того, як пошта
     * стала обовʼязковою. Прибрати, коли застосунок оновиться.
     */
    public function test_email_is_optional_for_app_requests(): void
    {
        Mail::fake();

        $this->withHeader('X-App-Platform', 'android')
            ->postJson('/api/orders', $this->validPayload(['email' => null]))
            ->assertCreated();

        $this->assertDatabaseCount('orders', 1);
    }

    public function test_app_request_with_invalid_email_still_rejected(): void
    {
        Mail::fake();

        $this->withHeader('X-App-Platform', 'android')
            ->postJson('/api/orders', $this->validPayload(['email' => 'not-an-email']))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['email']);
    }

    public function test_no_order_and_no_mail_when_email_missing(): void
    {
        Mail::fake();

        $this->postJson('/api/orders', $this->validPayload(['email' => null]));

        $this->assertDatabaseCount('orders', 0);
        Mail::assertNotSent(OrderConfirmation::class);
    }

    public function test_order_gets_track_token_and_returns_it(): void
    {
        Mail::fake();

        $response = $this->postJson('/api/orders', $this->validPayload())
            ->assertCreated();

        $token = $response->json('track_token');
        $this->assertNotEmpty($token);
        $this->assertSame($token, Order::first()->track_token);
    }

    public function test_order_saves_items_as_json(): void
    {
        Mail::fake();

        $items = [['id' => 7, 'name' => 'Маска', 'price' => 250.00, 'qty' => 1]];
        $this->postJson('/api/orders', $this->validPayload(['items' => $items]));

        $order = Order::first();
        $this->assertEquals($items, $order->items);
    }

    public function test_cod_payment_method_is_accepted(): void
    {
        Mail::fake();

        $this->postJson('/api/orders', $this->validPayload(['payment_method' => 'cod']))
            ->assertCreated();
    }

    public function test_total_is_recomputed_server_side_ignoring_client_value(): void
    {
        Mail::fake();

        // 2 × 199 = 398, but the client claims a bogus total.
        $this->postJson('/api/orders', $this->validPayload(['total' => 5]))
            ->assertCreated();

        $this->assertEquals('398.00', Order::first()->total);
    }

    public function test_cod_fee_is_added_server_side(): void
    {
        Mail::fake();

        $this->postJson('/api/orders', $this->validPayload(['payment_method' => 'cod']))
            ->assertCreated();

        // 398 subtotal + 20 COD fee
        $this->assertEquals('418.00', Order::first()->total);
    }

    public function test_percent_promo_code_is_applied(): void
    {
        Mail::fake();

        PromoCode::create(['code' => 'SALE10', 'type' => 'percent', 'value' => 10, 'is_active' => true]);

        $this->postJson('/api/orders', $this->validPayload(['promo_code' => 'sale10']))
            ->assertCreated();

        $order = Order::first();
        $this->assertEquals('39.80', $order->discount);   // 10% of 398
        $this->assertEquals('358.20', $order->total);      // 398 - 39.80
        $this->assertEquals('SALE10', $order->promo_code);
        $this->assertEquals(1, PromoCode::first()->used_count);
    }

    public function test_fixed_promo_code_is_applied(): void
    {
        Mail::fake();

        PromoCode::create(['code' => 'MINUS100', 'type' => 'fixed', 'value' => 100, 'is_active' => true]);

        $this->postJson('/api/orders', $this->validPayload(['promo_code' => 'MINUS100']))
            ->assertCreated();

        $order = Order::first();
        $this->assertEquals('100.00', $order->discount);
        $this->assertEquals('298.00', $order->total);
    }

    public function test_invalid_promo_code_is_rejected(): void
    {
        Mail::fake();

        $this->postJson('/api/orders', $this->validPayload(['promo_code' => 'NOPE']))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['promo_code']);

        $this->assertDatabaseCount('orders', 0);
    }

    public function test_promo_code_below_min_order_total_is_rejected(): void
    {
        Mail::fake();

        PromoCode::create(['code' => 'BIG', 'type' => 'fixed', 'value' => 50, 'min_order_total' => 1000, 'is_active' => true]);

        $this->postJson('/api/orders', $this->validPayload(['promo_code' => 'BIG']))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['promo_code']);
    }

    public function test_exhausted_promo_code_is_rejected(): void
    {
        Mail::fake();

        PromoCode::create(['code' => 'ONCE', 'type' => 'fixed', 'value' => 50, 'usage_limit' => 1, 'used_count' => 1, 'is_active' => true]);

        $this->postJson('/api/orders', $this->validPayload(['promo_code' => 'ONCE']))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['promo_code']);
    }
}
