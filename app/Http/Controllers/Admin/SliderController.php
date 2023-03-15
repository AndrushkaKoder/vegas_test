<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;

class SliderController extends BaseCrudController
{
	protected $model = Slider::class;
	protected $sortable = true;

	public function getValidationRules()
	{
		return [
			'inner' => 'image',
		];
	}
}
