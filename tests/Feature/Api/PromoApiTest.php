<?php

namespace Tests\Feature\Api;

use App\Models\PromoCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PromoApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_percent_code_returns_discount(): void
    {
        PromoCode::create(['code' => 'SALE10', 'type' => 'percent', 'value' => 10, 'is_active' => true]);

        $this->postJson('/api/promo/validate', ['code' => 'sale10', 'subtotal' => 500])
            ->assertOk()
            ->assertJson(['valid' => true, 'code' => 'SALE10', 'discount' => 50]);
    }

    public function test_valid_fixed_code_returns_discount(): void
    {
        PromoCode::create(['code' => 'MINUS100', 'type' => 'fixed', 'value' => 100, 'is_active' => true]);

        $this->postJson('/api/promo/validate', ['code' => 'MINUS100', 'subtotal' => 500])
            ->assertOk()
            ->assertJson(['valid' => true, 'discount' => 100]);
    }

    public function test_unknown_code_is_invalid(): void
    {
        $this->postJson('/api/promo/validate', ['code' => 'NOPE', 'subtotal' => 500])
            ->assertOk()
            ->assertJson(['valid' => false]);
    }

    public function test_inactive_code_is_invalid(): void
    {
        PromoCode::create(['code' => 'OFF', 'type' => 'percent', 'value' => 10, 'is_active' => false]);

        $this->postJson('/api/promo/validate', ['code' => 'OFF', 'subtotal' => 500])
            ->assertOk()
            ->assertJson(['valid' => false]);
    }

    public function test_below_min_order_total_is_invalid(): void
    {
        PromoCode::create(['code' => 'BIG', 'type' => 'fixed', 'value' => 50, 'min_order_total' => 1000, 'is_active' => true]);

        $this->postJson('/api/promo/validate', ['code' => 'BIG', 'subtotal' => 500])
            ->assertOk()
            ->assertJson(['valid' => false]);
    }

    public function test_expired_code_is_invalid(): void
    {
        PromoCode::create(['code' => 'OLD', 'type' => 'percent', 'value' => 10, 'expires_at' => now()->subDay(), 'is_active' => true]);

        $this->postJson('/api/promo/validate', ['code' => 'OLD', 'subtotal' => 500])
            ->assertOk()
            ->assertJson(['valid' => false]);
    }

    public function test_discount_never_exceeds_subtotal(): void
    {
        PromoCode::create(['code' => 'HUGE', 'type' => 'fixed', 'value' => 9999, 'is_active' => true]);

        $this->postJson('/api/promo/validate', ['code' => 'HUGE', 'subtotal' => 200])
            ->assertOk()
            ->assertJson(['valid' => true, 'discount' => 200]);
    }
}
