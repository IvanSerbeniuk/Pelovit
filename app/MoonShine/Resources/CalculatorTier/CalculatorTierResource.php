<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\CalculatorTier;

use App\Models\CalculatorTier;
use App\MoonShine\Resources\CalculatorTier\Pages\CalculatorTierDetailPage;
use App\MoonShine\Resources\CalculatorTier\Pages\CalculatorTierFormPage;
use App\MoonShine\Resources\CalculatorTier\Pages\CalculatorTierIndexPage;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Laravel\Resources\ModelResource;

/**
 * @extends ModelResource<CalculatorTier, CalculatorTierIndexPage, CalculatorTierFormPage, CalculatorTierDetailPage>
 */
class CalculatorTierResource extends ModelResource
{
    protected string $model = CalculatorTier::class;

    protected string $title = 'Калькулятор: знижки за тираж';

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            CalculatorTierIndexPage::class,
            CalculatorTierFormPage::class,
            CalculatorTierDetailPage::class,
        ];
    }
}
