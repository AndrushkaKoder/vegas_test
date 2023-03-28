<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;

class CatalogController extends Controller
{
	public function index()
	{
		$page = new Page();
		return view('frontend.catalog.index', compact('page'));
	}
}
