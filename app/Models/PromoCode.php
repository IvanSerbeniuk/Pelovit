<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected static function boot(): void
    {
        parent::boot();

        static::saving(function (self $promo) {
            $promo->code = strtoupper(trim((string) $promo->code));
        });
    }

    protected $fillable = [
        'code', 'type', 'value', 'min_order_total',
        'starts_at', 'expires_at', 'usage_limit', 'used_count', 'is_active',
    ];

    protected $casts = [
        'value' => 'decimal:2',
        'min_order_total' => 'decimal:2',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'usage_limit' => 'integer',
        'used_count' => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Human-readable discount, e.g. "10%" or "100₴". Used in the admin table.
     */
    public function getDiscountLabelAttribute(): string
    {
        return $this->type === 'percent'
            ? rtrim(rtrim((string) $this->value, '0'), '.').'%'
            : (int) round((float) $this->value).'₴';
    }

    /**
     * Usage counter, e.g. "3 / 10" or "3 / ∞". Used in the admin table.
     */
    public function getUsageLabelAttribute(): string
    {
        return $this->used_count.' / '.($this->usage_limit ?? '∞');
    }

    /**
     * Find an active promo code by its (case-insensitive) code.
     */
    public static function resolve(string $code): ?self
    {
        $code = strtoupper(trim($code));

        if ($code === '') {
            return null;
        }

        return static::active()
            ->whereRaw('UPPER(code) = ?', [$code])
            ->first();
    }

    /**
     * Returns null when the code can be applied to the given subtotal,
     * otherwise a Ukrainian error message explaining why it cannot.
     */
    public function validationError(float $subtotal): ?string
    {
        if (! $this->is_active) {
            return 'Промокод недійсний';
        }

        $now = now();

        if ($this->starts_at && $now->lt($this->starts_at)) {
            return 'Термін дії промокоду ще не почався';
        }

        if ($this->expires_at && $now->gt($this->expires_at)) {
            return 'Термін дії промокоду минув';
        }

        if ($this->usage_limit !== null && $this->used_count >= $this->usage_limit) {
            return 'Промокод вичерпано';
        }

        if ($this->min_order_total && $subtotal < (float) $this->min_order_total) {
            return 'Мінімальна сума замовлення для цього промокоду — '.(int) round((float) $this->min_order_total).'₴';
        }

        return null;
    }

    /**
     * Discount amount (in ₴) for the given subtotal, clamped so it never
     * exceeds the subtotal itself.
     */
    public function discountFor(float $subtotal): float
    {
        $discount = $this->type === 'percent'
            ? round($subtotal * (float) $this->value / 100, 2)
            : (float) $this->value;

        return (float) min($discount, $subtotal);
    }
}
