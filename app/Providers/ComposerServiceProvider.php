<?php

namespace App\Providers;

use App\Http\Composer\Frontend\Home\Header;
use App\Http\Composer\Frontend\Services\ServicesList;
use App\Http\Composer\admin\header\AdminHeader;
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
		View::composer('frontend.layout.header', Header::class);
		View::composer('frontend.service.widgets._list',ServicesList::class );
		View::composer('admin.layout.sidebar', AdminHeader::class);
	}
}
