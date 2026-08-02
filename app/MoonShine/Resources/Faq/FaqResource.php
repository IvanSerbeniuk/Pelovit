<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Faq;

use App\Models\Faq;
use App\MoonShine\Resources\Faq\Pages\FaqDetailPage;
use App\MoonShine\Resources\Faq\Pages\FaqFormPage;
use App\MoonShine\Resources\Faq\Pages\FaqIndexPage;
use MoonShine\Contracts\Core\PageContract;
use MoonShine\Laravel\Resources\ModelResource;

/**
 * @extends ModelResource<Faq, FaqIndexPage, FaqFormPage, FaqDetailPage>
 */
class FaqResource extends ModelResource
{
    protected string $model = Faq::class;

    protected string $title = 'FAQ';

    protected string $column = 'question';

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            FaqIndexPage::class,
            FaqFormPage::class,
            FaqDetailPage::class,
        ];
    }
}
