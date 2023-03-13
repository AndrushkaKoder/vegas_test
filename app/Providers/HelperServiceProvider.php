<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
	/**
	 * Register service.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap service.
	 *
	 * @return \Illuminate\Contracts\Auth\Authenticatable
	 */
	public function boot()
	{
		include app_path('Helpers/Helper.php');
	}
}
