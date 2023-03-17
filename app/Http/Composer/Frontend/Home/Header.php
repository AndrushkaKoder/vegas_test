<?php

namespace App\Http\Composer\Frontend\Home;

use App\Models\Navigation;
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
			->with('navigable')
			->with('childrenSorted')
			->with('childrenSorted.navigable')
			->get();
	}
}
