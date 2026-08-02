<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JournalApiController extends Controller
{
    /**
     * Поля для карток списку. Повний body та SEO-теги потрібні лише на
     * сторінці статті — у списку з 9 постів вони дарма роздували відповідь.
     */
    private const CARD_FIELDS = ['id', 'title', 'slug', 'excerpt', 'image', 'category', 'published_at'];

    public function index(Request $request): JsonResponse
    {
        $query = Post::published()->orderByDesc('published_at');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            // Шукаємо і в анонсі: за самим заголовком багато релевантних статей губилось.
            $search = '%'.$request->search.'%';
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', $search)
                    ->orWhere('excerpt', 'like', $search);
            });
        }

        $posts = $query->paginate(9)->withQueryString();
        $posts->getCollection()->transform(fn (Post $post) => $this->card($post));

        $featured = Post::published()
            ->where('is_featured', true)
            ->orderByDesc('published_at')
            ->limit(2)
            ->get()
            ->map(fn (Post $post) => $this->card($post));

        // Категорії з кількістю статей — щоб у сайдбарі було видно, де що є.
        $categories = Post::published()
            ->whereNotNull('category')
            ->selectRaw('category, COUNT(*) as total')
            ->groupBy('category')
            ->orderBy('category')
            ->get()
            ->map(fn ($row) => ['name' => $row->category, 'total' => (int) $row->total]);

        return response()->json(compact('posts', 'featured', 'categories'));
    }

    private function card(Post $post): array
    {
        $card = $post->only(self::CARD_FIELDS);
        $card['formatted_date'] = $post->formatted_date;

        return $card;
    }

    public function show(string $slug): JsonResponse
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();

        $related = Post::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        return response()->json(compact('post', 'related'));
    }
}
