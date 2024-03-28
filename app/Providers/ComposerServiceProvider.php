<?php

namespace App\Providers;

use App\Composers\CartComposer;
use App\Composers\CategoryComposer;
use Illuminate\Support\Facades\View;
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
        View::composer('client.layouts.app', CategoryComposer::class);
        View::composer('client.layouts.app', CartComposer::class);
    }
}
