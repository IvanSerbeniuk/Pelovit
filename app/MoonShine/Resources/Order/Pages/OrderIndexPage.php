<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Order\Pages;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use App\Models\Order;
use MoonShine\Laravel\QueryTags\QueryTag;
use MoonShine\UI\Components\Metrics\Wrapped\Metric;
use MoonShine\UI\Components\Metrics\Wrapped\ValueMetric;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Date;
use App\MoonShine\Resources\Order\OrderResource;
use MoonShine\Support\ListOf;
use Throwable;


/**
 * @extends IndexPage<OrderResource>
 */
class OrderIndexPage extends IndexPage
{
    protected bool $isLazy = true;

    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Клієнт', 'first_name')->sortable(),
            Text::make('Телефон', 'phone'),
            Text::make('Місто', 'city'),
            Number::make('Сума', 'total')->sortable(),
            Select::make('Статус', 'status')->options([
                'pending'   => 'Новий',
                'confirmed' => 'Підтверджено',
                'shipped'   => 'Відправлено',
                'completed' => 'Виконано',
                'cancelled' => 'Скасовано',
            ])->badge(fn($v) => match($v) {
                'pending'   => 'yellow',
                'confirmed' => 'blue',
                'shipped'   => 'purple',
                'completed' => 'green',
                'cancelled' => 'red',
                default     => 'gray',
            })->updateOnPreview(),
            Date::make('Дата', 'created_at')->format('d.m.Y H:i')->sortable(),
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
        ]);
    }

    /**
     * @return list<FieldContract>
     */
    protected function filters(): iterable
    {
        return [
            Select::make('Статус', 'status')->options([
                'pending'   => 'Новий',
                'confirmed' => 'Підтверджено',
                'shipped'   => 'Відправлено',
                'completed' => 'Виконано',
                'cancelled' => 'Скасовано',
            ])->nullable(),
        ];
    }

    /**
     * @return list<QueryTag>
     */
    protected function queryTags(): array
    {
        return [
            QueryTag::make('Всі', fn($q) => $q),
            QueryTag::make('Нові', fn($q) => $q->where('status', 'pending')),
            QueryTag::make('Підтверджені', fn($q) => $q->where('status', 'confirmed')),
            QueryTag::make('Відправлені', fn($q) => $q->where('status', 'shipped')),
            QueryTag::make('Виконані', fn($q) => $q->where('status', 'completed')),
            QueryTag::make('Скасовані', fn($q) => $q->where('status', 'cancelled')),
        ];
    }

    /**
     * @return list<Metric>
     */
    protected function metrics(): array
    {
        return [
            ValueMetric::make('Всього замовлень')
                ->value(Order::count())
                ->columnSpan(3),

            ValueMetric::make('Нові')
                ->value(Order::where('status', 'pending')->count())
                ->columnSpan(3),

            ValueMetric::make('Виконані')
                ->value(Order::where('status', 'completed')->count())
                ->columnSpan(3),

            ValueMetric::make('Виручка (₴)')
                ->value(number_format((float) Order::where('status', '!=', 'cancelled')->sum('total'), 0, '.', ' '))
                ->columnSpan(3),
        ];
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
