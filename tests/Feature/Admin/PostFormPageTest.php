<?php

namespace Tests\Feature\Admin;

use App\Models\Post;
use App\MoonShine\Resources\Post\PostResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MoonShine\Laravel\Models\MoonshineUser;
use Tests\TestCase;

class PostFormPageTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): MoonshineUser
    {
        return MoonshineUser::create([
            'name' => 'Admin',
            'email' => 'admin@test.local',
            'password' => bcrypt('secret'),
            'moonshine_user_role_id' => 1,
        ]);
    }

    /**
     * dir поля мусить збігатися з тим, де лежать обкладинки статей
     * (public/images/journal), інакше MoonShine приклеює зайвий сегмент
     * і в адмінці замість картинки — битий квадрат.
     */
    public function test_image_url_matches_stored_path(): void
    {
        $post = Post::factory()->create(['image' => 'images/journal/van.jpg']);

        $this->actingAs($this->admin(), 'moonshine')
            ->get(app(PostResource::class)->getFormPageUrl($post->id))
            ->assertOk()
            ->assertSee('/images/journal/van.jpg', false)
            ->assertDontSee('/posts/images/journal/van.jpg', false);
    }
}
