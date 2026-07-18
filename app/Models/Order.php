<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email',
        'city', 'branch', 'payment_method', 'comment',
        'items', 'total', 'discount', 'promo_code', 'status',
        'payment_status', 'payment_id',
    ];

    protected $casts = [
        'items' => 'array',
        'total' => 'decimal:2',
        'discount' => 'decimal:2',
    ];
}
