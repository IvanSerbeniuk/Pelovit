<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\PromoCode\Pages;

use App\MoonShine\Resources\PromoCode\PromoCodeResource;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;

/**
 * @extends FormPage<PromoCodeResource>
 */
class PromoCodeFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Box::make('Промокод', [
                ID::make(),
                Text::make('Код', 'code')
                    ->required()
                    ->hint('Реєстр не має значення — зберігається у верхньому регістрі'),
                Select::make('Тип знижки', 'type')
                    ->options(['percent' => 'Відсоток %', 'fixed' => 'Фіксована сума ₴'])
                    ->default('percent')
                    ->required(),
                Number::make('Значення', 'value')
                    ->step(0.01)
                    ->required()
                    ->hint('Для «Відсоток» — %, для «Фіксована сума» — ₴'),
                Number::make('Мін. сума замовлення, ₴', 'min_order_total')
                    ->step(0.01)
                    ->hint('Порожньо — без обмеження'),
                Date::make('Діє з', 'starts_at')->withTime(),
                Date::make('Діє до', 'expires_at')->withTime(),
                Number::make('Ліміт використань', 'usage_limit')
                    ->hint('Порожньо — без ліміту'),
                Number::make('Використано', 'used_count')->readonly(),
                Switcher::make('Активний', 'is_active')->default(true),
            ]),
        ];
    }
}
