<?php

namespace App\Http\Composer\Frontend\Services;

use App\Models\Service;
use Illuminate\View\View;

class ServicesList
{
	public function compose(View $view){

		$view->with('services', $this->getItems());
	}

	public function getItems(){

		return Service::query()->get();
	}

}
