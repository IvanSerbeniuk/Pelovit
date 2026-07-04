<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'           => fake()->name(),
            'phone'          => fake()->phoneNumber(),
            'contact_method' => fake()->randomElement(['call', 'telegram', 'viber', 'whatsapp']),
            'company'        => null,
            'source'         => fake()->randomElement(['home', 'contacts', 'masters', 'opt', 'contract']),
            'status'         => 'new',
        ];
    }
}
