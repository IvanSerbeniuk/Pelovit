<?php

namespace Tests\Feature\Admin;

use App\Models\PromoCode;
use App\MoonShine\Resources\PromoCode\PromoCodeResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MoonShine\Laravel\Models\MoonshineUser;
use Tests\TestCase;

class PromoCodeAdminTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): MoonshineUser
    {
        return MoonshineUser::create([
            'name' => 'Admin',
            'email' => 'admin@test.local',
            'password' => bcrypt('secret'),
            'moonshine_user_role_id' => 1,
        ]);
    }

    public function test_index_page_renders_with_records(): void
    {
        PromoCode::create(['code' => 'SALE10', 'type' => 'percent', 'value' => 10, 'is_active' => true]);
        PromoCode::create(['code' => 'MINUS100', 'type' => 'fixed', 'value' => 100, 'usage_limit' => 2, 'used_count' => 1, 'is_active' => true]);

        $url = app(PromoCodeResource::class)->getIndexPageUrl();

        $admin = $this->admin();

        // Page shell renders without the 500 that a bad cell closure would cause.
        $this->actingAs($admin, 'moonshine')->get($url)->assertOk();

        // The async table component is where each cell (discount_label / usage_label)
        // is actually rendered from the row model — this is the exact path that
        // previously threw a TypeError from a bad preview closure signature.
        $this->actingAs($admin, 'moonshine')
            ->get('/admin/component/promo-code-index-page/promo-code-resource?_component_name=index-table-promo-code-resource')
            ->assertOk()
            ->assertSee('SALE10')
            ->assertSee('10%')
            ->assertSee('1 / 2');
    }

    public function test_form_page_renders(): void
    {
        $url = app(PromoCodeResource::class)->getFormPageUrl();

        $this->actingAs($this->admin(), 'moonshine')
            ->get($url)
            ->assertOk()
            ->assertSee('Промокод');
    }
}
