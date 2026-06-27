<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Order;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Metrics\Wrapped\ValueMetric;
use MoonShine\UI\Components\Layout\Grid;
#[\MoonShine\MenuManager\Attributes\SkipMenu]

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle()
        ];
    }

    public function getTitle(): string
    {
        return $this->title ?: 'Dashboard';
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
    {
        $today = now()->toDateString();

        return [
            Grid::make([
                ValueMetric::make('Всього замовлень')
                    ->value(Order::count())
                    ->icon('shopping-bag')
                    ->columnSpan(3),

                ValueMetric::make('Нові (очікують)')
                    ->value(Order::where('status', 'pending')->count())
                    ->icon('bell')
                    ->columnSpan(3),

                ValueMetric::make('Замовлень сьогодні')
                    ->value(Order::whereDate('created_at', $today)->count())
                    ->icon('calendar')
                    ->columnSpan(3),

                ValueMetric::make('Виручка (₴)')
                    ->value(number_format((float) Order::where('status', '!=', 'cancelled')->sum('total'), 0, '.', ' '))
                    ->icon('banknotes')
                    ->columnSpan(3),
            ]),
        ];
    }
}
