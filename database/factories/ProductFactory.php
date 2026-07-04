<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'category_id' => Category::factory(),
            'name'        => $name,
            'slug'        => Str::slug($name),
            'description' => fake()->paragraph(),
            'price'       => fake()->randomFloat(2, 50, 1000),
            'old_price'   => null,
            'image'       => null,
            'images'      => [],
            'brand'       => fake()->company(),
            'stock'       => fake()->numberBetween(0, 100),
            'is_active'   => true,
            'is_featured' => false,
        ];
    }

    public function inactive(): static
    {
        return $this->state(['is_active' => false]);
    }

    public function featured(): static
    {
        return $this->state(['is_featured' => true]);
    }

    public function withDiscount(): static
    {
        return $this->state(function (array $attrs) {
            $price = $attrs['price'];
            return ['old_price' => round($price * 1.3, 2)];
        });
    }
}
