<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application service.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application service.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
