<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
	public function index(){
		$page = Page::whereUri('services')->firstOrFail();
		$services = Service::all();
		return view('frontend.services.index', compact('page', 'services'));
	}

	public function show($slug)
	{
		$page = Service::query()->where('slug', $slug)->firstOrFail();
		return view('frontend.services.show', compact('page'));
	}
}
