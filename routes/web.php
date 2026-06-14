<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $promotions = \App\Models\Product::where('is_active', true)
        ->where('is_featured', true)
        ->limit(4)
        ->get();

    $allProducts = \App\Models\Product::where('is_active', true)
        ->limit(8)
        ->get();

    $categories = \App\Models\Category::whereNull('parent_id')
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

    return view('home', compact('promotions', 'allProducts', 'categories'));
});

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/about', fn() => view('about_us'));
Route::get('/kontractne-vyrobnyctvo', fn() => view('kontractne_vyrobnyctvo'))->name('kontractne_vyrobnyctvo');
Route::get('/masters', fn() => view('masters'));
Route::get('/masters_category', fn() => view('masters_category'));
Route::get('/contacts', function () {
    $team = \App\Models\TeamMember::orderBy('sort_order')->get();
    return view('contacts', compact('team'));
});
Route::get('/cart', function () {
    $featured = \App\Models\Product::where('is_active', true)
        ->where('is_featured', true)
        ->limit(4)
        ->get();
    return view('cart', compact('featured'));
})->name('cart');
Route::get('/order', fn() => view('order'))->name('order');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/success', fn() => view('order_success'))->name('order.success');
Route::get('/catalog-journal', fn() => view('catalog_journal'));
Route::get('/article', fn() => view('article'));
Route::get('/opt', fn() => view('opt'));
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
