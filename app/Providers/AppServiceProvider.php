<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            try {
                $view->with('settings', Setting::allKeyed());
            } catch (\Throwable) {
                $view->with('settings', []);
            }
        });
    }
}
