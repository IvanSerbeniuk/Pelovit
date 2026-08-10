<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    public const STATUS_LABELS = [
        'pending' => 'Новий',
        'confirmed' => 'Підтверджено',
        'shipped' => 'Відправлено',
        'completed' => 'Виконано',
        'cancelled' => 'Скасовано',
    ];

    public const PAYMENT_STATUS_LABELS = [
        'pending' => 'Очікує оплати',
        'paid' => 'Оплачено',
        'failed' => 'Не вдалась',
    ];

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

    /**
     * Токен видається при створенні й ніколи не приходить від клієнта —
     * тому його немає у $fillable.
     */
    protected static function booted(): void
    {
        static::creating(function (self $order) {
            $order->track_token ??= Str::random(48);
        });
    }

    /**
     * Посилання на сторінку статусу у вітрині (Nuxt), а не в Laravel:
     * на проді все, крім /api та /admin, віддає Nuxt.
     */
    public function trackUrl(): string
    {
        return rtrim((string) config('app.frontend_url'), '/')
            .'/order/track?token='.$this->track_token;
    }

    public function statusLabel(): string
    {
        return self::STATUS_LABELS[$this->status] ?? $this->status;
    }

    public function paymentStatusLabel(): string
    {
        return self::PAYMENT_STATUS_LABELS[$this->payment_status] ?? $this->payment_status;
    }
}
