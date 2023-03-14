<?php

namespace App\Http\Controllers\Frontend\Lk;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LkController extends Controller
{

	public function index()
	{
		return view('frontend.lk.index.index', ['page' => new Page()]);
	}


	public function create()
	{
		//
	}


	public function store(Request $request)
	{
		//
	}


	public function show($id)
	{
		//
	}


	public function edit()
	{
		$page = new Page();
		$item = user();
		return view('frontend.lk.pages.settings', compact('item', 'page'));
	}


	public function update()
	{


	}


	public function destroy($id)
	{
		//
	}


	public function orders(){

		$page = new Page();

		return view('frontend.lk.pages.orders', compact('page'));
	}
}
