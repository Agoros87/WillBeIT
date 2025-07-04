<?php

namespace App\Providers;

use App\View\Components\LanguageDropdown;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $listen = [
        \App\Events\PostCreated::class => [
            \App\Listeners\SendPostCreatedNotifications::class,
        ],
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('language-dropdown', LanguageDropdown::class);
    }
}
