<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\AdminMenuComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**a
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(
            ['admin.*'],
            AdminMenuComposer::class
        );
    }
}
