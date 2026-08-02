<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Faq\Pages;

use App\Models\Faq;
use App\MoonShine\Resources\Faq\FaqResource;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends FormPage<FaqResource>
 */
class FaqFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Box::make('Питання', [
                ID::make(),
                Select::make('Сторінка', 'page')->options(Faq::PAGES)->required(),
                Text::make('Питання', 'question')->required(),
                Textarea::make('Відповідь', 'answer')->required(),
                Number::make('Порядок', 'sort_order'),
                Switcher::make('Активне', 'is_active'),
            ]),
        ];
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [
            'page' => ['required', 'string', 'max:30'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ];
    }
}
