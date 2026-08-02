<?php

namespace Tests\Feature\Admin;

use App\Models\CalculatorOption;
use App\Models\CalculatorTier;
use App\MoonShine\Resources\CalculatorOption\CalculatorOptionResource;
use App\MoonShine\Resources\CalculatorTier\CalculatorTierResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MoonShine\Laravel\Models\MoonshineUser;
use Tests\TestCase;

class CalculatorAdminTest extends TestCase
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

    public function test_calculator_resources_are_reachable(): void
    {
        CalculatorOption::create([
            'group' => 'product', 'name' => 'Крем', 'value' => 1.2, 'is_active' => true,
        ]);
        CalculatorTier::create(['min_quantity' => 300, 'discount_percent' => 5]);

        $admin = $this->admin();

        $this->actingAs($admin, 'moonshine')
            ->get(app(CalculatorOptionResource::class)->getIndexPageUrl())
            ->assertOk()
            ->assertSee('Калькулятор: опції');

        $this->actingAs($admin, 'moonshine')
            ->get(app(CalculatorTierResource::class)->getIndexPageUrl())
            ->assertOk()
            ->assertSee('Калькулятор: знижки за тираж');
    }

    public function test_calculator_group_is_present_in_admin_menu(): void
    {
        $response = $this->actingAs($this->admin(), 'moonshine')
            ->get(app(CalculatorOptionResource::class)->getIndexPageUrl())
            ->assertOk();

        // Група меню та обидва її пункти — інакше ресурси існують,
        // але дістатись до них можна лише прямим посиланням.
        $response->assertSee('Калькулятор');
        $response->assertSee('Опції');
        $response->assertSee('Знижки за тираж');
    }
}
