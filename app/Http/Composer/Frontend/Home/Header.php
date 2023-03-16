<?php

namespace App\Http\Composer\Frontend\Home;

use App\Models\Navigation;
use App\Models\Page;
use Illuminate\View\View;

class Header
{
	public function compose(View $view)
	{
		$view->with('navigation', $this->getItems());
	}

	public function getItems()
	{
		return Navigation::query()
			->sFirstLevel()
			->sSorted()
			->get();
	}
}
