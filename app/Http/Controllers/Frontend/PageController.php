<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
	public function showPage($uri)
	{
		$page = Page::whereUri($uri)->firstOrFail();
		return view("frontend.page.show.show", compact('page'));
	}

	public function about()
	{
		$page = Page::whereUri('about')->firstOrFail();
		return view('frontend.pages.system.about.index', compact('page'));
	}


}
