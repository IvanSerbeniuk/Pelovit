<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Faq\Pages;

use App\Models\Faq;
use App\MoonShine\Resources\Faq\FaqResource;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends DetailPage<FaqResource>
 */
class FaqDetailPage extends DetailPage
{
    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make(),
            Select::make('Сторінка', 'page')->options(Faq::PAGES),
            Text::make('Питання', 'question'),
            Textarea::make('Відповідь', 'answer'),
            Number::make('Порядок', 'sort_order'),
            Switcher::make('Активне', 'is_active'),
        ];
    }
}
