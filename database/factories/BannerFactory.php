<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => fake()->sentence(4),
            'subtitle'    => fake()->sentence(10),
            'image'       => null,
            'button_text' => fake()->words(2, true),
            'link'        => '/catalog',
            'sort_order'  => fake()->numberBetween(0, 100),
            'is_active'   => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(['is_active' => false]);
    }
}
