<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Product\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Product\ProductResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Image;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Components\Layout\Column;
use Throwable;


/**
 * @extends FormPage<ProductResource>
 */
class ProductFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Box::make('Основне', [
                Grid::make([
                    Column::make([
                        Text::make('Назва', 'name')->required(),
                        Text::make('Slug', 'slug')->hint('Заповниться автоматично якщо порожньо'),
                        BelongsTo::make('Категорія', 'category', fn($item) => $item->name, resource: \App\MoonShine\Resources\Category\CategoryResource::class)->required(),
                        Text::make('Бренд', 'brand'),
                        Textarea::make('Опис', 'description'),
                    ])->columnSpan(8),
                    Column::make([
                        Number::make('Ціна (₴)', 'price')->required()->step(0.01),
                        Number::make('Стара ціна (₴)', 'old_price')->step(0.01)->nullable(),
                        Number::make('Залишок', 'stock')->required(),
                        Switcher::make('Активний', 'is_active'),
                        Switcher::make('Хіт продажів', 'is_featured'),
                    ])->columnSpan(4),
                ]),
            ]),
            Box::make('Зображення', [
                Image::make('Фото', 'image')
                    ->dir('products')
                    ->disk('public_root'),
            ]),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    protected function formButtons(): ListOf
    {
        return parent::formButtons();
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [];
    }

    /**
     * @param  FormBuilder  $component
     *
     * @return FormBuilder
     */
    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
    {
        return $component;
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
