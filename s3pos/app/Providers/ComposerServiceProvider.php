<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['Admin/*'], 'App\Http\ViewComposers\AdminComposer');
        view()->composer(['User/*'], 'App\Http\ViewComposers\UserComposer');
    }
}
