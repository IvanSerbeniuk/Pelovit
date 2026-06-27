<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Product\Pages;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\QueryTags\QueryTag;
use MoonShine\UI\Components\Metrics\Wrapped\Metric;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Image;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use App\Models\Category;
use App\Models\Product;
use App\MoonShine\Resources\Product\ProductResource;
use MoonShine\UI\Components\ActionButton;
use MoonShine\Support\ListOf;
use Throwable;


/**
 * @extends IndexPage<ProductResource>
 */
class ProductIndexPage extends IndexPage
{
    protected bool $isLazy = true;

    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make()->sortable(),
            Image::make('Фото', 'image')->disk('public_root'),
            Text::make('Назва', 'name')->sortable(),
            BelongsTo::make('Категорія', 'category', fn($item) => $item->name, resource: \App\MoonShine\Resources\Category\CategoryResource::class),
            Text::make('Бренд', 'brand'),
            Number::make('Ціна', 'price')->sortable(),
            Number::make('Залишок', 'stock')->sortable(),
            Switcher::make('Активний', 'is_active')->updateOnPreview(),
            Switcher::make('Хіт', 'is_featured')->updateOnPreview(),
        ];
    }

    /**
     * @return ListOf<ActionButtonContract>
     */
    protected function buttons(): ListOf
    {
        return new ListOf(\MoonShine\Contracts\UI\ActionButtonContract::class, [
            $this->modifyEditButton($this->getResource()->getEditButton(isAsync: $this->isAsync())),
            $this->modifyDeleteButton($this->getResource()->getDeleteButton(redirectAfterDelete: $this->getResource()->getRedirectAfterDelete(), isAsync: $this->isAsync())),
            $this->modifyMassDeleteButton($this->getResource()->getMassDeleteButton(redirectAfterDelete: $this->getResource()->getRedirectAfterDelete(), isAsync: $this->isAsync())),
            ActionButton::make('Активувати')
                ->bulk($this->getResource()->getListComponentName())
                ->method('massActivate', events: [$this->getResource()->getListEventName()])
                ->success()
                ->icon('check-circle'),
            ActionButton::make('Деактивувати')
                ->bulk($this->getResource()->getListComponentName())
                ->method('massDeactivate', events: [$this->getResource()->getListEventName()])
                ->warning()
                ->icon('x-circle'),
        ]);
    }

    /**
     * @return list<FieldContract>
     */
    protected function filters(): iterable
    {
        return [
            BelongsTo::make('Категорія', 'category', fn($item) => $item->name, resource: \App\MoonShine\Resources\Category\CategoryResource::class)->nullable(),
            Text::make('Назва', 'name'),
            Text::make('Бренд', 'brand'),
            Switcher::make('Активний', 'is_active'),
            Switcher::make('Хіт', 'is_featured'),
        ];
    }

    /**
     * @return list<QueryTag>
     */
    protected function queryTags(): array
    {
        return [
            QueryTag::make('Всі', fn($q) => $q),
            QueryTag::make('Активні', fn($q) => $q->where('is_active', true)),
            QueryTag::make('Хіти', fn($q) => $q->where('is_featured', true)),
            QueryTag::make('Немає в наявності', fn($q) => $q->where('stock', 0)),
        ];
    }

    /**
     * @return list<Metric>
     */
    protected function metrics(): array
    {
        return [];
    }

    /**
     * @param  TableBuilder  $component
     *
     * @return TableBuilder
     */
    protected function modifyListComponent(ComponentContract $component): ComponentContract
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
