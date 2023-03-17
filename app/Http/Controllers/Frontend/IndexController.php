<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;


class IndexController extends Controller
{

	public function index()
	{
//		$file = 'app/storage/files/8fkzXddQHimGV5GodY334G0rHxQJMza586IfTEkI.svg';
//
//		$a =  substr($file, strrpos($file, '.') + 1);
//		dd($a);

		$page = Page::whereUri('/')->firstOrFail();
		return view('frontend.home.index', compact('page'));
	}


}

