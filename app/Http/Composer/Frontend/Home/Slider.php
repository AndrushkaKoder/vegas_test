<?php

namespace App\Http\Composer\Frontend\Home;

use Illuminate\View\View;

class Slider
{
	public function compose(View $view)
	{
		$view->with('slides', $this->getItems());
	}

	public function getItems()
	{
		return \App\Models\Slider::query()
			->where('visible', 1)
			->sSorted()
			->sHasPhoto()
			->with('files')
			->get();
	}
}
