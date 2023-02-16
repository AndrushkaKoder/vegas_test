<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function showPage($uri)
	{
		$page = Page::whereUrl($uri)->firstOrFail();
		return view("frontend.pages.show.show", compact('page'));
	}


}
