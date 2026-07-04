<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(5);

        return [
            'title'        => $title,
            'slug'         => Str::slug($title) . '-' . fake()->unique()->numberBetween(1, 9999),
            'excerpt'      => fake()->sentence(15),
            'body'         => fake()->paragraphs(3, true),
            'image'        => null,
            'category'     => fake()->word(),
            'tags'         => [],
            'is_published' => true,
            'is_featured'  => false,
            'published_at' => now()->subDays(fake()->numberBetween(1, 30)),
        ];
    }

    public function unpublished(): static
    {
        return $this->state(['is_published' => false, 'published_at' => null]);
    }

    public function featured(): static
    {
        return $this->state(['is_featured' => true]);
    }
}
