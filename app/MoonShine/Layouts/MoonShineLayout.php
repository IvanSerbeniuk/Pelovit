<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\Palettes\PurplePalette;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\ColorManager\PaletteContract;
use App\MoonShine\Resources\Order\OrderResource;
use App\MoonShine\Resources\Product\ProductResource;
use App\MoonShine\Resources\Category\CategoryResource;
use App\MoonShine\Resources\Post\PostResource;
use App\MoonShine\Resources\Banner\BannerResource;
use App\MoonShine\Resources\Subscriber\SubscriberResource;
use App\MoonShine\Pages\SettingsPage;
use MoonShine\MenuManager\MenuItem;
use MoonShine\MenuManager\MenuGroup;

final class MoonShineLayout extends AppLayout
{
    /**
     * @var null|class-string<PaletteContract>
     */
    protected ?string $palette = PurplePalette::class;

    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            ...parent::menu(),
            MenuItem::make(OrderResource::class, 'Замовлення')->icon('shopping-bag'),
            MenuGroup::make('Каталог', [
                MenuItem::make(ProductResource::class, 'Товари')->icon('squares-2x2'),
                MenuItem::make(CategoryResource::class, 'Категорії')->icon('tag'),
            ])->icon('squares-plus'),
            MenuGroup::make('Контент', [
                MenuItem::make(BannerResource::class, 'Банери')->icon('photo'),
                MenuItem::make(PostResource::class, 'Журнал')->icon('document-text'),
            ])->icon('pencil-square'),
            MenuItem::make(SubscriberResource::class, 'Підписники')->icon('users'),
            MenuItem::make(SettingsPage::class, 'Налаштування')->icon('cog-6-tooth'),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }
}
