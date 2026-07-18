<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\PromoCode;

use App\Models\PromoCode;
use App\MoonShine\Resources\PromoCode\Pages\PromoCodeDetailPage;
use App\MoonShine\Resources\PromoCode\Pages\PromoCodeFormPage;
use App\MoonShine\Resources\PromoCode\Pages\PromoCodeIndexPage;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\SortDirection;

/**
 * @extends ModelResource<PromoCode, PromoCodeIndexPage, PromoCodeFormPage, PromoCodeDetailPage>
 */
class PromoCodeResource extends ModelResource
{
    protected string $model = PromoCode::class;

    protected string $title = 'Промокоди';

    protected string $column = 'code';

    protected SortDirection $sortDirection = SortDirection::DESC;

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            PromoCodeIndexPage::class,
            PromoCodeFormPage::class,
            PromoCodeDetailPage::class,
        ];
    }
}
