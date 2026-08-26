<?php

namespace Tests\Feature\Api;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MoonShine\Laravel\Models\MoonshineUser;
use Tests\TestCase;

class AdminLinkApiTest extends TestCase
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

    public function test_guest_gets_no_link(): void
    {
        $product = Product::factory()->create();

        $this->getJson("/api/admin/edit-link?resource=product&id={$product->id}")
            ->assertOk()
            ->assertJson(['authenticated' => false, 'url' => null]);
    }

    public function test_admin_gets_link_to_product_form(): void
    {
        $product = Product::factory()->create();

        $response = $this->actingAs($this->admin(), 'moonshine')
            ->getJson("/api/admin/edit-link?resource=product&id={$product->id}")
            ->assertOk()
            ->assertJson(['authenticated' => true]);

        $this->assertStringContainsString('/admin/resource/product-resource', $response->json('url'));
        $this->assertStringEndsWith((string) $product->id, $response->json('url'));
    }

    public function test_admin_gets_link_to_post_form(): void
    {
        $post = Post::factory()->create();

        $response = $this->actingAs($this->admin(), 'moonshine')
            ->getJson("/api/admin/edit-link?resource=post&id={$post->id}")
            ->assertOk()
            ->assertJson(['authenticated' => true]);

        $this->assertStringContainsString('/admin/resource/post-resource', $response->json('url'));
        $this->assertStringEndsWith((string) $post->id, $response->json('url'));
    }

    public function test_guest_gets_no_link_for_post(): void
    {
        $post = Post::factory()->create();

        $this->getJson("/api/admin/edit-link?resource=post&id={$post->id}")
            ->assertOk()
            ->assertJson(['authenticated' => false, 'url' => null]);
    }

    public function test_unknown_resource_gets_no_link(): void
    {
        $product = Product::factory()->create();

        $this->actingAs($this->admin(), 'moonshine')
            ->getJson("/api/admin/edit-link?resource=orders&id={$product->id}")
            ->assertOk()
            ->assertJson(['authenticated' => true, 'url' => null]);
    }
}
