<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\MoonShine\Resources\Post\PostResource;
use App\MoonShine\Resources\Product\ProductResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Віддає вітрині посилання на сторінку редагування в адмінці —
 * але тільки якщо в браузері є активна сесія MoonShine.
 * Маршрут підключений до групи `web`, бо працює з сесійною кукою.
 */
class AdminLinkController extends Controller
{
    /** Ресурси, для яких вітрина може попросити посилання. */
    private const RESOURCES = [
        'product' => ProductResource::class,
        'post' => PostResource::class,
    ];

    public function show(Request $request): JsonResponse
    {
        if (! Auth::guard('moonshine')->check()) {
            return response()->json(['authenticated' => false, 'url' => null]);
        }

        $resource = (string) $request->query('resource');
        $id = $request->integer('id');

        if ($id <= 0 || ! isset(self::RESOURCES[$resource])) {
            return response()->json(['authenticated' => true, 'url' => null]);
        }

        return response()->json([
            'authenticated' => true,
            'url' => app(self::RESOURCES[$resource])->getFormPageUrl($id),
        ]);
    }
}
