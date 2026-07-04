<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamMemberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'       => fake()->name(),
            'position'   => fake()->jobTitle(),
            'phone'      => fake()->phoneNumber(),
            'image'      => null,
            'sort_order' => fake()->numberBetween(0, 100),
        ];
    }
}
