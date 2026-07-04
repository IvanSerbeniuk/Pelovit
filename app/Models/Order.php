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
        'items', 'total', 'status',
    ];

    protected $casts = [
        'items' => 'array',
        'total' => 'decimal:2',
    ];
}
