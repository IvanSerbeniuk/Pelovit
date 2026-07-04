<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'name'       => $name,
            'slug'       => Str::slug($name),
            'parent_id'  => null,
            'image'      => null,
            'is_active'  => true,
            'sort_order' => fake()->numberBetween(0, 100),
        ];
    }

    public function inactive(): static
    {
        return $this->state(['is_active' => false]);
    }

    public function child(int $parentId): static
    {
        return $this->state(['parent_id' => $parentId]);
    }
}
