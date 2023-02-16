<?php

namespace App\Providers;

use App\Http\Composer\Frontend\Home\Services;
use App\Http\Composer\Frontend\Services\ServicesList;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ComposerServiceProvider extends ServiceProvider
{

	public function register()
	{
		//
	}

	public function boot()
	{
		View::composer('frontend.home._services', Services::class);
		View::composer('frontend.services.widgets._list',ServicesList::class );
	}
}
