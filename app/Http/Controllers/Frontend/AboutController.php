<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Page;

class AboutController extends Controller
{

    public function index()
	{
		$page = Page::whereUrl('/about')->firstOrFail();

		return view('frontend.about', compact('page'));
	}
}
