<?php

namespace Database\Seeders;

use App\Models\CalculatorOption;
use App\Models\CalculatorTier;
use App\Models\Setting;
use Illuminate\Database\Seeder;

/**
 * УВАГА: усі числа нижче — плейсхолдери, щоб калькулятор працював одразу.
 * Реальні ставки вносяться в адмінці (Калькулятор → Опції / Тиражі),
 * після чого цей сидер більше запускати не потрібно.
 */
class CalculatorSeeder extends Seeder
{
    public function run(): void
    {
        $options = [
            // group, name, value, hint
            ['product', 'Крем', 1.20, 'Собівартість 1 мл'],
            ['product', 'Сироватка', 2.10, 'Собівартість 1 мл'],
            ['product', 'Маска', 1.05, 'Собівартість 1 мл'],
            ['product', 'Гель', 0.85, 'Собівартість 1 мл'],
            ['product', 'Олія', 1.60, 'Собівартість 1 мл'],
            ['product', 'Скраб', 0.95, 'Собівартість 1 мл'],
            ['product', 'Шампунь', 0.70, 'Собівартість 1 мл'],

            ['formula', 'Базова формула', 1.00, 'Множник до собівартості'],
            ['formula', 'Формула з активами', 1.35, 'Множник до собівартості'],
            ['formula', 'Максимально натуральне', 1.60, 'Множник до собівартості'],

            ['packaging', 'Пляшка з переробленого ПЕТ', 12.00, 'Ціна за штуку'],
            ['packaging', 'Скляна банка з кришкою', 26.00, 'Ціна за штуку'],
            ['packaging', 'Туба з дозатором', 18.50, 'Ціна за штуку'],

            ['label', 'Паперова', 2.50, 'Ціна за штуку'],
            ['label', 'Плівкова', 4.00, 'Ціна за штуку'],
            ['label', 'Прозора', 5.20, 'Ціна за штуку'],

            ['box', 'Так', 9.00, 'Ціна за штуку'],
            ['box', 'Ні', 0.00, 'Без коробки'],
        ];

        $images = [
            'Пляшка з переробленого ПЕТ' => 'images/cosmetic_shot.png',
            'Скляна банка з кришкою'     => 'images/classic300.png',
            'Туба з дозатором'           => 'images/promo_image.png',
        ];

        $sort = [];
        foreach ($options as [$group, $name, $value, $hint]) {
            $sort[$group] = ($sort[$group] ?? 0) + 10;

            CalculatorOption::updateOrCreate(
                ['group' => $group, 'name' => $name],
                [
                    'value'      => $value,
                    'hint'       => $hint,
                    'image'      => $images[$name] ?? null,
                    'sort_order' => $sort[$group],
                    'is_active'  => true,
                ],
            );
        }

        foreach ([[100, 0], [300, 5], [500, 10], [1000, 15]] as [$qty, $discount]) {
            CalculatorTier::updateOrCreate(
                ['min_quantity' => $qty],
                ['discount_percent' => $discount],
            );
        }

        foreach ([
            'calc_min_batch_total' => '7500',
            'calc_production_days' => '15',
            'calc_spread_percent'  => '12',
        ] as $key => $value) {
            if (Setting::where('key', $key)->doesntExist()) {
                Setting::set($key, $value);
            }
        }
    }
}
