<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Порожній масив у JSON — це [], і на вітрині filters.sort стає
     * методом масиву, через що зʼявляється фантомний активний фільтр.
     */
    public function test_filters_is_an_object_even_when_empty(): void
    {
        $this->getJson('/api/catalog')
            ->assertOk()
            ->assertSee('"filters":{}', escape: false);
    }

    public function test_categories_carry_product_counts(): void
    {
        $parent = Category::factory()->create(['parent_id' => null]);
        $child = Category::factory()->create(['parent_id' => $parent->id]);

        Product::factory(2)->create(['category_id' => $parent->id]);
        Product::factory(3)->create(['category_id' => $child->id]);
        Product::factory()->inactive()->create(['category_id' => $child->id]);

        $response = $this->getJson('/api/catalog')->assertOk();

        $row = collect($response->json('categories'))->firstWhere('id', $parent->id);

        // У батьківської — разом із дочірньою, неактивні не рахуються.
        $this->assertSame(5, $row['products_count']);
        $this->assertSame(3, $row['children'][0]['products_count']);
    }

    public function test_price_range_ignores_zero_priced_products(): void
    {
        Product::factory()->create(['price' => 0]);
        Product::factory()->create(['price' => 300]);
        Product::factory()->create(['price' => 2300]);

        $this->getJson('/api/catalog')
            ->assertOk()
            ->assertJsonPath('price_range.min', 300)
            ->assertJsonPath('price_range.max', 2300);
    }

    public function test_returns_required_keys(): void
    {
        $response = $this->getJson('/api/catalog');

        $response->assertOk()
            ->assertJsonStructure(['products', 'categories', 'brands', 'filters']);
    }

    public function test_inactive_products_excluded(): void
    {
        Product::factory(3)->create();
        Product::factory(2)->inactive()->create();

        $response = $this->getJson('/api/catalog');

        $this->assertEquals(3, $response->json('products.total'));
    }

    public function test_filter_by_category_slug(): void
    {
        $cat = Category::factory()->create(['slug' => 'face']);
        Product::factory(2)->create(['category_id' => $cat->id]);
        Product::factory(3)->create();

        $response = $this->getJson('/api/catalog?category=face');

        $this->assertEquals(2, $response->json('products.total'));
    }

    public function test_filter_by_category_includes_children(): void
    {
        $parent = Category::factory()->create(['slug' => 'parent']);
        $child = Category::factory()->child($parent->id)->create();
        Product::factory(2)->create(['category_id' => $child->id]);
        Product::factory()->create(['category_id' => $parent->id]);
        Product::factory(3)->create();

        $response = $this->getJson('/api/catalog?category=parent');

        $this->assertEquals(3, $response->json('products.total'));
    }

    public function test_filter_by_brand(): void
    {
        Product::factory(2)->create(['brand' => 'Pelovit']);
        Product::factory(3)->create(['brand' => 'Other']);

        $response = $this->getJson('/api/catalog?brand=Pelovit');

        $this->assertEquals(2, $response->json('products.total'));
    }

    public function test_filter_by_min_price(): void
    {
        Product::factory()->create(['price' => 100]);
        Product::factory()->create(['price' => 200]);
        Product::factory()->create(['price' => 300]);

        $response = $this->getJson('/api/catalog?min_price=150');

        $this->assertEquals(2, $response->json('products.total'));
    }

    public function test_filter_by_max_price(): void
    {
        Product::factory()->create(['price' => 100]);
        Product::factory()->create(['price' => 200]);
        Product::factory()->create(['price' => 300]);

        $response = $this->getJson('/api/catalog?max_price=250');

        $this->assertEquals(2, $response->json('products.total'));
    }

    public function test_search_by_name(): void
    {
        Product::factory()->create(['name' => 'Крем для обличчя']);
        Product::factory()->create(['name' => 'Маска глиняна']);

        $response = $this->getJson('/api/catalog?q=Крем');

        $this->assertEquals(1, $response->json('products.total'));
    }

    public function test_sort_price_asc(): void
    {
        Product::factory()->create(['price' => 300]);
        Product::factory()->create(['price' => 100]);
        Product::factory()->create(['price' => 200]);

        $response = $this->getJson('/api/catalog?sort=price_asc');

        $prices = collect($response->json('products.data'))->pluck('price')->map(fn ($p) => (float) $p)->all();
        $this->assertEquals([100.0, 200.0, 300.0], $prices);
    }

    public function test_sort_price_desc(): void
    {
        Product::factory()->create(['price' => 100]);
        Product::factory()->create(['price' => 300]);
        Product::factory()->create(['price' => 200]);

        $response = $this->getJson('/api/catalog?sort=price_desc');

        $prices = collect($response->json('products.data'))->pluck('price')->map(fn ($p) => (float) $p)->all();
        $this->assertEquals([300.0, 200.0, 100.0], $prices);
    }

    public function test_paginated_12_per_page(): void
    {
        Product::factory(15)->create();

        $response = $this->getJson('/api/catalog');

        $this->assertCount(12, $response->json('products.data'));
        $this->assertEquals(15, $response->json('products.total'));
    }

    public function test_brands_list_excludes_empty(): void
    {
        Product::factory()->create(['brand' => 'Alpha']);
        Product::factory()->create(['brand' => '']);
        Product::factory()->create(['brand' => null]);

        $response = $this->getJson('/api/catalog');

        $this->assertEquals(['Alpha'], $response->json('brands'));
    }

    public function test_filters_echoed_back(): void
    {
        $response = $this->getJson('/api/catalog?category=face&sort=price_asc&brand=X');

        $filters = $response->json('filters');
        $this->assertEquals('face', $filters['category']);
        $this->assertEquals('price_asc', $filters['sort']);
        $this->assertEquals('X', $filters['brand']);
    }
}
