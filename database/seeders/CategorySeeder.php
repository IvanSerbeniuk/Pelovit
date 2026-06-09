<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $tree = [
            [
                'name' => 'Лікувальні препарати',
                'slug' => 'likuvalni',
                'sort_order' => 1,
                'children' => [
                    ['name' => 'ШКТ',                    'slug' => 'shkt',         'sort_order' => 1],
                    ['name' => 'Стоматологія',            'slug' => 'stomatologiya','sort_order' => 2],
                    ['name' => 'Подологія',               'slug' => 'podologiya',   'sort_order' => 3],
                    ['name' => 'Опорно-руховий апарат',   'slug' => 'oda',          'sort_order' => 4],
                    ['name' => 'ЛОР',                     'slug' => 'lor',          'sort_order' => 5],
                    ['name' => 'Загальне',                'slug' => 'zagalne',      'sort_order' => 6],
                    ['name' => 'Дерматологія',            'slug' => 'derm',         'sort_order' => 7],
                ],
            ],
            [
                'name' => 'Доглядова косметика',
                'slug' => 'kosmetika',
                'sort_order' => 2,
                'children' => [
                    ['name' => 'Обличчя', 'slug' => 'obliche', 'sort_order' => 1],
                    ['name' => 'Тіло',    'slug' => 'tilo',    'sort_order' => 2],
                    ['name' => 'Руки',    'slug' => 'ruki',    'sort_order' => 3],
                    ['name' => 'Ноги',    'slug' => 'nogi',    'sort_order' => 4],
                ],
            ],
            [
                'name' => 'Комплекси',
                'slug' => 'kompleksi',
                'sort_order' => 3,
                'children' => [
                    ['name' => 'Здорові діти',     'slug' => 'zdorovi-dity',        'sort_order' => 1],
                    ['name' => 'Здоровий хребет',  'slug' => 'zdorovyj-khrebet',    'sort_order' => 2],
                    ['name' => 'Здорове схуднення','slug' => 'zdorove-skhudnennia', 'sort_order' => 3],
                    ['name' => 'Здорове дихання',  'slug' => 'zdorove-dykhannia',   'sort_order' => 4],
                ],
            ],
            [
                'name' => 'Парфумована лінійка ART17',
                'slug' => 'parfumy',
                'sort_order' => 4,
                'children' => [],
            ],
            [
                'name' => 'PRO серія Майстер',
                'slug' => 'pro-seriia-majster',
                'sort_order' => 5,
                'children' => [],
            ],
        ];

        foreach ($tree as $rootData) {
            $children = $rootData['children'];
            unset($rootData['children']);

            $root = Category::create($rootData);

            foreach ($children as $childData) {
                $childData['parent_id'] = $root->id;
                Category::create($childData);
            }
        }
    }
}
