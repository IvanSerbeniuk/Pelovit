<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $primaryKey = 'key';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['key', 'value'];

    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever("setting_{$key}", function () use ($key, $default) {
            return static::where('key', $key)->value('value') ?? $default;
        });
    }

    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget("setting_{$key}");
        Cache::forget('settings_all');
    }

    public static function allKeyed(): array
    {
        return Cache::rememberForever('settings_all', function () {
            return static::pluck('value', 'key')->toArray();
        });
    }
}
