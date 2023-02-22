<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Navigation;

class NavController extends Controller
{

	public function index()
	{
		$items = Navigation::query()
			->sFirstLevel()
			->sSorted()
			->get();

		return view('admin.nav.index', compact('items'));
	}


	public function create()
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


	public function store()
	{

	}

	public function change_structure()
	{
		function changeStruct ($data, $parent_id) {
			foreach ($data as $key => $value) {
				$position = $key;
				$id = $value['id'];

				Navigation::query()->where('id', $id)->update([
					'position' => $position,
					'parent_id' => $parent_id
				]);

				if (isset($value['children']) && !empty($value['children'])) {
					changeStruct($value['children'], $id);
				}
			}

		};

		changeStruct(request()->data, 0);
	}
}
