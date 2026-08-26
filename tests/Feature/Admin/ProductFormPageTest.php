<?php

namespace Tests\Feature\Admin;

use App\Models\Product;
use App\MoonShine\Resources\Product\ProductResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MoonShine\Laravel\Models\MoonshineUser;
use Tests\TestCase;

class ProductFormPageTest extends TestCase
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

    public function test_description_and_instruction_use_html_editor(): void
    {
        $product = Product::factory()->create([
            'description' => '<p>Опис</p>',
            'instruction' => '<p>Склад</p>',
        ]);

        $response = $this->actingAs($this->admin(), 'moonshine')
            ->get(app(ProductResource::class)->getFormPageUrl($product->id))
            ->assertOk();

        // Редактор підвантажується разом зі сторінкою…
        $response->assertSee('moonshine-tinymce/tinymce.min.js', false);
        // …і прив'язаний саме до цих двох полів.
        $response->assertSee('name="description"', false);
        $response->assertSee('name="instruction"', false);
        $response->assertSee('Інструкція');
    }
}
