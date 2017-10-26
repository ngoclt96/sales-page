<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function ($view) {
            $view->with('stylesheets', \Assets::getStylesheets());
            $view->with('scripts', \Assets::getJavascripts());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('Assets', function () {
            return new \App\Supports\Assets;
        });
    }
}
