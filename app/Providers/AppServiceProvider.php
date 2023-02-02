<?php

namespace App\Providers;

use App\Http\Controllers\IndexController;
use App\Models\Contacts;
use App\Models\Social;
use http\Header;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;


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
        Paginator::useBootstrap();

        $socials = Social::query()->get();
        $contacts = Contacts::query()->get();

        View::share('socials', $socials);
        View::share('contacts', $contacts);
    }
}
