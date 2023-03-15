<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;


class IndexController extends Controller
{

	public function index()
	{
		$page = Page::whereUri('/')->firstOrFail();
		return view('frontend.home.index', compact('page'));
	}


}

