<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the form components
        \Form::component('imageField', 'components.form.image', ['name', 'value', 'attributes']);
        \Form::component('checkboxField', 'components.form.checkbox', ['name', 'value', 'attributes']);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
