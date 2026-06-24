<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Order\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Order\OrderResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\Phone;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Preview;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Components\Layout\Column;
use Throwable;


/**
 * @extends FormPage<OrderResource>
 */
class OrderFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Box::make('Статус', [
                Select::make('Статус', 'status')->options([
                    'pending'   => 'Новий',
                    'confirmed' => 'Підтверджено',
                    'shipped'   => 'Відправлено',
                    'completed' => 'Виконано',
                    'cancelled' => 'Скасовано',
                ]),
            ]),
            Box::make('Клієнт', [
                Grid::make([
                    Column::make([
                        Text::make("Ім'я", 'first_name')->readonly(),
                        Text::make('Прізвище', 'last_name')->readonly(),
                        Phone::make('Телефон', 'phone')->readonly(),
                        Email::make('Email', 'email')->readonly(),
                    ])->columnSpan(6),
                    Column::make([
                        Text::make('Місто', 'city')->readonly(),
                        Text::make('Відділення', 'branch')->readonly(),
                        Select::make('Оплата', 'payment_method')->options([
                            'card' => 'Карта',
                            'cod'  => 'Накладний платіж',
                        ])->readonly(),
                        Number::make('Сума', 'total')->readonly(),
                    ])->columnSpan(6),
                ]),
                Textarea::make('Коментар', 'comment')->readonly(),
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
