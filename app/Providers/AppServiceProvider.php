<?php

namespace App\Providers;

use App\Menu;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('home', function($view) {
            $view->with('menus', Menu::menus());
        });
        Schema::defaultStringLength(191);
    }
}