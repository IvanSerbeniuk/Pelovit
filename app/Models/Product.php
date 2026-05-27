<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'description',
        'price', 'old_price', 'image', 'images',
        'brand', 'stock', 'is_active', 'is_featured',
    ];

    protected $casts = [
        'images'      => 'array',
        'is_active'   => 'boolean',
        'is_featured' => 'boolean',
        'price'       => 'decimal:2',
        'old_price'   => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getDiscountPercentAttribute(): ?int
    {
        if (!$this->old_price || $this->old_price <= $this->price) return null;

        return (int) round((1 - $this->price / $this->old_price) * 100);
    }
}
