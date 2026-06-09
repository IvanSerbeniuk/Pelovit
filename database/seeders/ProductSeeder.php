<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $slugs = [
            'obliche', 'tilo', 'ruki', 'nogi',
        ];

        $cats = Category::whereIn('slug', $slugs)->pluck('id', 'slug');

        $products = [
            // Обличчя
            [
                'category_id' => $cats['obliche'],
                'name'        => 'Крем для обличчя PELOVIT Зволожуючий',
                'slug'        => 'krem-obliche-zvolozhuiuchyi',
                'description' => 'Інтенсивний зволожуючий крем на основі гіалуронової кислоти та пелоїдного екстракту. Відновлює водний баланс шкіри, розгладжує дрібні зморшки.',
                'price'       => 349.00,
                'old_price'   => 420.00,
                'brand'       => 'PELOVIT',
                'stock'       => 50,
                'is_featured' => true,
            ],
            [
                'category_id' => $cats['obliche'],
                'name'        => 'Сироватка для обличчя PELOVIT Anti-Age',
                'slug'        => 'syrovatka-obliche-anti-age',
                'description' => 'Концентрована сироватка з пептидами та ретинолом. Зменшує глибину зморшок, підвищує пружність шкіри вже після 2 тижнів застосування.',
                'price'       => 589.00,
                'old_price'   => null,
                'brand'       => 'PELOVIT',
                'stock'       => 35,
                'is_featured' => true,
            ],
            [
                'category_id' => $cats['obliche'],
                'name'        => 'Маска для обличчя PELOVIT Грязьова',
                'slug'        => 'maska-obliche-hriazova',
                'description' => 'Очищуюча грязьова маска на основі лікувальних пелоїдів Куяльника. Виводить токсини, звужує пори, вирівнює тон шкіри.',
                'price'       => 275.00,
                'old_price'   => 320.00,
                'brand'       => 'PELOVIT',
                'stock'       => 60,
                'is_featured' => false,
            ],
            [
                'category_id' => $cats['obliche'],
                'name'        => 'Тонік для обличчя PELOVIT Освіжаючий',
                'slug'        => 'tonik-obliche-osvizhaluiuchyi',
                'description' => 'Легкий тонік з екстрактом алое вера та мінералами Мертвого моря. Готує шкіру до нанесення крему, звужує пори.',
                'price'       => 189.00,
                'old_price'   => null,
                'brand'       => 'PELOVIT',
                'stock'       => 80,
                'is_featured' => false,
            ],
            // Тіло
            [
                'category_id' => $cats['tilo'],
                'name'        => 'Крем для тіла PELOVIT Антицелюлітний',
                'slug'        => 'krem-tilo-antytselihlitnyi',
                'description' => 'Активний антицелюлітний крем з кофеїном, ефірними оліями та пелоїдним комплексом. Розгладжує шкіру, покращує мікроциркуляцію.',
                'price'       => 398.00,
                'old_price'   => 480.00,
                'brand'       => 'PELOVIT',
                'stock'       => 45,
                'is_featured' => true,
            ],
            [
                'category_id' => $cats['tilo'],
                'name'        => 'Олія для тіла PELOVIT Живильна',
                'slug'        => 'oliia-tilo-zhyvylna',
                'description' => 'Розкішна суха олія з аргановою олією, вітаміном Е та екстрактом пелоїдів. Живить, пом\'якшує та надає шкірі сяйво.',
                'price'       => 445.00,
                'old_price'   => null,
                'brand'       => 'PELOVIT',
                'stock'       => 30,
                'is_featured' => true,
            ],
            [
                'category_id' => $cats['tilo'],
                'name'        => 'Скраб для тіла PELOVIT Сольовий',
                'slug'        => 'skrab-tilo-solovyi',
                'description' => 'Глибокоочищуючий сольовий скраб з морською сіллю та кокосовою олією. Видаляє відмерлі клітини, залишає шкіру гладенькою.',
                'price'       => 299.00,
                'old_price'   => 350.00,
                'brand'       => 'PELOVIT',
                'stock'       => 55,
                'is_featured' => false,
            ],
            [
                'category_id' => $cats['tilo'],
                'name'        => 'Лосьйон для тіла PELOVIT Зволожуючий',
                'slug'        => 'loson-tilo-zvolozhuiuchyi',
                'description' => 'Легкий зволожуючий лосьйон швидкого поглинання з гліцерином та пантенолом. Зволожує шкіру на 24 години.',
                'price'       => 229.00,
                'old_price'   => null,
                'brand'       => 'PELOVIT',
                'stock'       => 70,
                'is_featured' => false,
            ],
            // Руки
            [
                'category_id' => $cats['ruki'],
                'name'        => 'Крем для рук PELOVIT Захисний',
                'slug'        => 'krem-ruky-zakhysnyi',
                'description' => 'Захисний крем для рук з пелоїдним екстрактом, сечовиною та гліцерином. Захищає від несприятливих факторів, загоює мікротріщини.',
                'price'       => 149.00,
                'old_price'   => 185.00,
                'brand'       => 'PELOVIT',
                'stock'       => 100,
                'is_featured' => false,
            ],
            [
                'category_id' => $cats['ruki'],
                'name'        => 'Крем для рук PELOVIT Омолоджуючий',
                'slug'        => 'krem-ruky-omolodziuiuchyi',
                'description' => 'Антивіковий крем для рук з ретинолом та коензимом Q10. Зменшує пігментні плями, розгладжує шкіру рук.',
                'price'       => 245.00,
                'old_price'   => null,
                'brand'       => 'PELOVIT',
                'stock'       => 65,
                'is_featured' => true,
            ],
            [
                'category_id' => $cats['ruki'],
                'name'        => 'Маска для рук PELOVIT Нічна',
                'slug'        => 'maska-ruky-nichna',
                'description' => 'Інтенсивна нічна маска-рукавички з пелоїдами та гіалуроновою кислотою. Відновлює шкіру рук під час сну.',
                'price'       => 320.00,
                'old_price'   => 380.00,
                'brand'       => 'PELOVIT',
                'stock'       => 40,
                'is_featured' => false,
            ],
            // Ноги
            [
                'category_id' => $cats['nogi'],
                'name'        => 'Крем для ніг PELOVIT Пом\'якшуючий',
                'slug'        => 'krem-nohy-pomiagshuiuchyi',
                'description' => 'Інтенсивний крем для ніг з 10% сечовиною та пелоїдним екстрактом. Пом\'якшує загрубілу шкіру п\'ят, запобігає появі тріщин.',
                'price'       => 199.00,
                'old_price'   => 240.00,
                'brand'       => 'PELOVIT',
                'stock'       => 85,
                'is_featured' => false,
            ],
            [
                'category_id' => $cats['nogi'],
                'name'        => 'Гель для ніг PELOVIT Охолоджуючий',
                'slug'        => 'hel-nohy-okholodzhuiuchyi',
                'description' => 'Освіжаючий гель для втомлених ніг з ментолом, кінським каштаном та екстрактом пелоїдів. Знімає втому та набряклість.',
                'price'       => 265.00,
                'old_price'   => null,
                'brand'       => 'PELOVIT',
                'stock'       => 55,
                'is_featured' => true,
            ],
            [
                'category_id' => $cats['nogi'],
                'name'        => 'Сіль для ванни ніг PELOVIT Розслабляюча',
                'slug'        => 'sil-vanna-nohy-rozslabliaiucha',
                'description' => 'Морська сіль для ванни ніг збагачена пелоїдним екстрактом та ефірними оліями лаванди та розмарину. Знімає напругу, усуває неприємний запах.',
                'price'       => 175.00,
                'old_price'   => 210.00,
                'brand'       => 'PELOVIT',
                'stock'       => 90,
                'is_featured' => false,
            ],
            [
                'category_id' => $cats['nogi'],
                'name'        => 'Скраб для ніг PELOVIT Педикюрний',
                'slug'        => 'skrab-nohy-pedikyurnyi',
                'description' => 'Професійний скраб для педикюру з дрібнодисперсним пемзовим порошком та пелоїдами. Повністю видаляє загрубілості.',
                'price'       => 235.00,
                'old_price'   => null,
                'brand'       => 'PELOVIT',
                'stock'       => 45,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $data) {
            Product::create($data);
        }
    }
}
