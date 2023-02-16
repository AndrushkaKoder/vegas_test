<?php

namespace App\Http\Composer\Frontend\Home;

use App\Models\Service;
use Illuminate\View\View;

class Services
{
	public function compose(View $view)
	{
		$view->with('services', $this->getItems());
	}

	public function getItems()
	{
		return Service::query()->with('files')->get();
	}
}
