<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;


class IndexController extends Controller
{

	public function index()
	{
		$page = Page::whereUrl('/')->firstOrFail();
		return view('frontend.home.index', compact('page'));
	}

	public function show($slug)
	{
		$page = Service::query()->where('slug', $slug)->firstOrFail();
		return view('frontend.services.show', compact('page'));
	}

}

