<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;

class ServicesController extends Controller
{
	public function index(){
		$page = Page::whereUri('service')->firstOrFail();
		$items = Service::with('files')->get();
		return view('frontend.service.index', compact('page', 'items'));
	}

	public function show($slug)
	{
		$page = Service::query()->where('slug', $slug)->firstOrFail();
		return view('frontend.service.show', compact('page'));
	}
}
