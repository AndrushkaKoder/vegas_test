<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\Page;
use Illuminate\Http\Request;

class NavController extends Controller
{

	public function index()
	{

		$items = Navigation::query()->where('parent_id', '0')->get();

		return view('admin.nav.index', compact('items'));
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


	public function edit($id)
	{
		//
	}


	public function destroy($id)
	{
		//
	}

	public function updateAjax()
	{
		foreach (request()->data as $value){
				dump(request()->data);
//			$navObj = Navigation::query()
		}
	}
}
