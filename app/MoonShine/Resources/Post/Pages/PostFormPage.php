<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Post\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Post\PostResource;
use App\Models\Post;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Textarea;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Components\FlexibleRender;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Components\Layout\Column;
use Throwable;


/**
 * @extends FormPage<PostResource>
 */
class PostFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        $categories = Post::whereNotNull('category')->where('category', '!=', '')
            ->distinct()->orderBy('category')->pluck('category', 'category')->toArray();

        return [
            FlexibleRender::make('<script>
(function(){
    const T={а:"a",б:"b",в:"v",г:"h",ґ:"g",д:"d",е:"e",є:"ie",ж:"zh",з:"z",и:"y",і:"i",ї:"i",й:"i",к:"k",л:"l",м:"m",н:"n",о:"o",п:"p",р:"r",с:"s",т:"t",у:"u",ф:"f",х:"kh",ц:"ts",ч:"ch",ш:"sh",щ:"shch",ю:"iu",я:"ia",ь:"",ъ:""};
    function toSlug(s){return s.split("").map(c=>T[c.toLowerCase()]??(c.match(/[a-z0-9]/)?c.toLowerCase():c)).join("").replace(/[^a-z0-9]+/g,"-").replace(/^-+|-+$/g,"");}
    function bindSlug(){
        const n=document.querySelector(\'input[name="title"]\');
        const sl=document.querySelector(\'input[name="slug"]\');
        if(!n||!sl||n._slugBound)return;
        n._slugBound=true;
        n.addEventListener("input",function(){sl.value=toSlug(n.value);sl.dispatchEvent(new Event("input",{bubbles:true}));});
    }
    document.addEventListener("DOMContentLoaded",bindSlug);
    setTimeout(bindSlug,300);
})();
</script>'),
            Box::make('Контент', [
                Text::make('Заголовок', 'title')->required(),
                Textarea::make('Анонс', 'excerpt'),
                TinyMce::make('Текст статті', 'body')->required(),
            ]),
            Box::make('Налаштування', [
                Grid::make([
                    Column::make([
                        Text::make('Slug', 'slug')->hint('Заповниться автоматично'),
                        Select::make('Категорія', 'category')
                            ->options($categories)
                            ->nullable()
                            ->searchable(),
                        Date::make('Дата публікації', 'published_at'),
                    ])->columnSpan(6),
                    Column::make([
                        Image::make('Зображення', 'image')->dir('posts')->disk('public_root'),
                        Switcher::make('Опублікована', 'is_published'),
                        Switcher::make('Обрана публікація', 'is_featured'),
                    ])->columnSpan(6),
                ]),
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
