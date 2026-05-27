<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->with('children')
            ->orderBy('sort_order')
            ->get();

        $products = Product::where('is_active', true)
            ->with('category')
            ->when($request->category, fn($q, $slug) =>
            $q->whereHas('category', fn($q) => $q->where('slug', $slug))
            )
            ->when($request->brand, fn($q, $brand) =>
            $q->where('brand', $brand)
            )
            ->when($request->min_price, fn($q, $min) =>
            $q->where('price', '>=', $min)
            )
            ->when($request->max_price, fn($q, $max) =>
            $q->where('price', '<=', $max)
            )
            ->when($request->sort, function ($q, $sort) {
                match ($sort) {
                    'price_asc'  => $q->orderBy('price'),
                    'price_desc' => $q->orderByDesc('price'),
                    'new'        => $q->orderByDesc('created_at'),
                    default      => $q->orderByDesc('is_featured'),
                };
            })
            ->paginate(12)
            ->withQueryString();

        return view('catalog', compact('categories', 'products'));
    }
}
