<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function showPage($uri)
	{
		$page = Page::whereUri($uri)->firstOrFail();
		return view("frontend.pages.show.show", compact('page'));
	}

	public function about()
	{
		$page = Page::whereUri('about')->firstOrFail();
		return view('frontend.pages.system.about.index', compact('page'));
	}


}
