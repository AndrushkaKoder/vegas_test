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

	public function edit($id)
	{
		$item = Navigation::query()->findOrFail($id);

		return view('admin.nav.edit', compact('item'));
	}


	public function create()
	{
		return view('admin.nav.create');
	}



	public function update($id): \Illuminate\Http\RedirectResponse
	{
		$page = Navigation::query()->findOrFail($id);
		$page->update(request()->all());

		return redirect()->back()->with('success', 'Данные о странице обновлены');
	}

	public function store(): \Illuminate\Http\RedirectResponse
	{
		request()->validate([
			'title' => 'required',
			'url' => 'required'
		]);

		Navigation::query()->create([
			'title' => request()->title,
			'url' => request()->url,
			'position' => 0,
			'parent_id' => 0
		]);
		return redirect()->route('admin.nav.index')->with('success', 'Страница добавлена');
	}


	public function destroy($id): \Illuminate\Http\RedirectResponse
	{
		Navigation::query()->findOrFail($id)->delete();

		return redirect()->route('admin.nav.index')->with('success', 'Страница удалена');
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
