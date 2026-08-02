<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\CalculatorTier\Pages;

use App\MoonShine\Resources\CalculatorTier\CalculatorTierResource;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Number;

/**
 * @extends DetailPage<CalculatorTierResource>
 */
class CalculatorTierDetailPage extends DetailPage
{
    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make(),
            Number::make('Від кількості, шт', 'min_quantity'),
            Number::make('Знижка, %', 'discount_percent'),
        ];
    }
}
