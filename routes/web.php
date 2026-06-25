<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $promotions = \App\Models\Product::where('is_active', true)
        ->where('is_featured', true)
        ->limit(4)
        ->with('category')
        ->get();

    $allProducts = \App\Models\Product::where('is_active', true)
        ->limit(8)
        ->with('category')
        ->get();

    $categories = \App\Models\Category::whereNull('parent_id')
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

    $latestPosts = \App\Models\Post::published()
        ->orderByDesc('published_at')
        ->limit(3)
        ->get();

    return Inertia::render('Home', compact('promotions', 'allProducts', 'categories', 'latestPosts'));
});

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/about', fn() => Inertia::render('About'));
Route::get('/kontractne-vyrobnyctvo', fn() => Inertia::render('KontractneVyrobnyctvo'))->name('kontractne_vyrobnyctvo');
Route::get('/masters', fn() => Inertia::render('Masters'));
Route::get('/masters_category', fn() => Inertia::render('MastersCategory'));
Route::get('/contacts', function () {
    $team = \App\Models\TeamMember::orderBy('sort_order')->get();
    return Inertia::render('Contacts', compact('team'));
});
Route::get('/cart', function () {
    $featured = \App\Models\Product::where('is_active', true)
        ->where('is_featured', true)
        ->limit(4)
        ->get();
    return Inertia::render('Cart', compact('featured'));
})->name('cart');
Route::get('/order', fn() => Inertia::render('Order'))->name('order');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/success', fn() => Inertia::render('OrderSuccess'))->name('order.success');
Route::get('/catalog-journal', [PostController::class, 'index'])->name('journal');
Route::get('/journal/{slug}', [PostController::class, 'show'])->name('journal.show');
Route::redirect('/article', '/catalog-journal');
Route::get('/opt', fn() => Inertia::render('Opt'));
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
