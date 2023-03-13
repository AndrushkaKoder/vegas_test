<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends BaseCrudController
{
	protected $model = Page::class;

	public function getValidationRules(){
		return [
			'uri' => 'required',
			'title' => 'required',
		];
	}
}
