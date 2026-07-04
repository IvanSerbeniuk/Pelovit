<?php

namespace Tests\Feature\Api;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    use RefreshDatabase;

    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'first_name'     => 'Іван',
            'last_name'      => 'Петренко',
            'phone'          => '+380631234567',
            'email'          => 'test@example.com',
            'city'           => 'Одеса',
            'branch'         => '5',
            'payment_method' => 'card',
            'comment'        => null,
            'items'          => [
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
            ->assertJsonValidationErrors(['first_name', 'last_name', 'phone', 'payment_method', 'items', 'total']);
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

    public function test_email_is_optional(): void
    {
        Mail::fake();

        $this->postJson('/api/orders', $this->validPayload(['email' => null]))
            ->assertCreated();
    }

    public function test_sends_confirmation_mail_when_email_provided(): void
    {
        Mail::fake();

        $this->postJson('/api/orders', $this->validPayload(['email' => 'buyer@example.com']));

        Mail::assertSent(\App\Mail\OrderConfirmation::class, fn($m) => $m->hasTo('buyer@example.com'));
    }

    public function test_no_confirmation_mail_when_email_missing(): void
    {
        Mail::fake();

        $this->postJson('/api/orders', $this->validPayload(['email' => null]));

        Mail::assertNotSent(\App\Mail\OrderConfirmation::class);
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
}
