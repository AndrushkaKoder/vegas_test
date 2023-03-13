<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;

class ServicesController extends BaseCrudController
{
	protected $model = Service::class;
	protected $paginateQuantity = 5;
	protected $sortable = true;


	public function getValidationRules()
	{
		return [
			'title' => 'required',
			'short_content' => 'required',
			'content' => 'required',
			'inner' => 'image',
			'outer' => 'image',
		];
	}


}
