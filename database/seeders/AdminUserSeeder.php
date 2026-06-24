<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@pelovit.ua'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('pelovit2024'),
                'is_admin' => true,
            ]
        );
    }
}
