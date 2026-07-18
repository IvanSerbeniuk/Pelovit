<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\PromoCode\Pages;

use App\MoonShine\Resources\PromoCode\PromoCodeResource;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;

/**
 * @extends DetailPage<PromoCodeResource>
 */
class PromoCodeDetailPage extends DetailPage
{
    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make(),
            Text::make('Код', 'code'),
            Select::make('Тип знижки', 'type')
                ->options(['percent' => 'Відсоток %', 'fixed' => 'Фіксована сума ₴']),
            Number::make('Значення', 'value'),
            Number::make('Мін. сума замовлення, ₴', 'min_order_total'),
            Date::make('Діє з', 'starts_at')->format('d.m.Y H:i'),
            Date::make('Діє до', 'expires_at')->format('d.m.Y H:i'),
            Number::make('Ліміт використань', 'usage_limit'),
            Number::make('Використано', 'used_count'),
            Switcher::make('Активний', 'is_active'),
            Date::make('Створено', 'created_at')->format('d.m.Y H:i'),
        ];
    }
}
