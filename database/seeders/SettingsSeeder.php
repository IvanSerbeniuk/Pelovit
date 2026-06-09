<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'phone'         => '+38 (063) 309-03-03',
            'phone_2'       => '+38 (063) 599-22-02',
            'phone_3'       => '+38 (093) 494-85-57',
            'email'         => 'aksimed@ukr.net',
            'instagram_url' => 'https://www.instagram.com/pelovit_r/',
            'facebook_url'  => 'https://www.facebook.com/PLab.Mineral',
            'youtube_url'   => 'https://www.youtube.com/channel/UCjHWCyCPWeWFLGjwnoxhwXg',
            'telegram_url'  => '',
        ];

        foreach ($settings as $key => $value) {
            \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
