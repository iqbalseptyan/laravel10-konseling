<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewView;

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
        View::composer('*', function (ViewView $view) {
            $route = '';
            if (Auth::check()) {

                if (Auth::user()->level == 0) {
                    $route = 'admin/';
                }
                return $view->with('route', $route);
            }
            return $view->with('route', $route);
        });
    }
}
