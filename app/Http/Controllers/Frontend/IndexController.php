<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;


class IndexController extends Controller
{

	public function index()
	{
		$page = Page::whereUrl('/')->first();
		$service = Service::query()->with('files')->get();
		return view('frontend.index', compact('page', 'service'));
	}

	public function about()
	{

	}

	public function show($slug)
	{
		$page = Service::query()->where('slug', '=', $slug)->first()->load('files');
		return view('frontend.services.show', compact('page'));
	}
}

