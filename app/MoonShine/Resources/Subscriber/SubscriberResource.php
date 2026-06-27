<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Subscriber;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subscriber;
use App\MoonShine\Resources\Subscriber\Pages\SubscriberIndexPage;
use App\MoonShine\Resources\Subscriber\Pages\SubscriberFormPage;
use App\MoonShine\Resources\Subscriber\Pages\SubscriberDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Subscriber, SubscriberIndexPage, SubscriberFormPage, SubscriberDetailPage>
 */
class SubscriberResource extends ModelResource
{
    protected string $model = Subscriber::class;

    protected string $title = 'Subscribers';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            SubscriberIndexPage::class,
            SubscriberFormPage::class,
            SubscriberDetailPage::class,
        ];
    }
}
