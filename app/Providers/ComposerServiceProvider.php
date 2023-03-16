<?php

namespace App\Providers;

use App\Http\Composer\Frontend\Home\Header;
use App\Http\Composer\Frontend\Home\Slider;
use App\Http\Composer\Frontend\Services\ServicesList;
use App\Http\Composer\admin\header\sidebarNotifications;
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
		View::composer('Admin.layout.sidebar', sidebarNotifications::class);
		View::composer('frontend.layout.header', Header::class);
		View::composer('frontend.service.widgets._list', ServicesList::class);
		View::composer('frontend.home.index', Slider::class);
	}
}
