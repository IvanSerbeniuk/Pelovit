<?php

namespace Tests\Feature\Api;

use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingCacheTest extends TestCase
{
    use RefreshDatabase;

    public function test_cache_is_flushed_when_setting_is_deleted(): void
    {
        Setting::set('app_store_url', 'https://apps.apple.com/app/id1');

        $this->assertSame('https://apps.apple.com/app/id1', Setting::allKeyed()['app_store_url']);

        Setting::where('key', 'app_store_url')->first()->delete();

        $this->assertArrayNotHasKey('app_store_url', Setting::allKeyed());
        $this->assertNull(Setting::get('app_store_url'));
    }

    public function test_cache_is_flushed_when_setting_is_saved_directly(): void
    {
        Setting::set('phone', '+38 (063) 000-00-00');
        Setting::allKeyed(); // прогріваємо кеш

        // Правка повз set() — саме так зберігає адмінка та сідери.
        $setting = Setting::where('key', 'phone')->first();
        $setting->value = '+38 (063) 111-11-11';
        $setting->save();

        $this->assertSame('+38 (063) 111-11-11', Setting::allKeyed()['phone']);
        $this->assertSame('+38 (063) 111-11-11', Setting::get('phone'));
    }
}
