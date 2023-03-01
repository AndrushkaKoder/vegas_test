<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\Page;
use App\Models\Service;

class NavController extends Controller
{

	public function index()
	{
		$items = Navigation::query()
			->sFirstLevel()
			->sSorted()
			->get();

		return view('admin.nav.index.index', compact('items'));
	}


	public function edit($id)
	{
		$action = 'admin.nav.update';
		/** @var Navigation $item */
		$item = Navigation::query()->findOrFail($id);
		$groups = $this->getNavigableGroups($item);

		return view('admin.nav.edit.edit', compact('item', 'action', 'groups'));
	}


	public function create()
	{
		$action = 'admin.nav.store';
		/** @var Navigation $item */
		$item = new Navigation();
		$groups = $this->getNavigableGroups($item);

		return view('admin.nav.edit.edit', compact('item', 'groups', 'action'));
	}


	public function update($id): \Illuminate\Http\RedirectResponse
	{
		$item = Navigation::query()->findOrFail($id);
		$item->fill($this->getFillData());
		$item->save();

		return redirect()->route('admin.nav.edit', $item->id)->with('success', 'Данные о ссылке обновлены');
	}


	public function store(): \Illuminate\Http\RedirectResponse
	{
		request()->validate([
			'title' => 'required',
		]);

		$item = new Navigation();
		$item->fill($this->getFillData());
		$item->save();

		return redirect()->route('admin.nav.edit', $item->id)->with('success', 'Навигационная ссылка добавлена');
	}


	public function destroy($id): \Illuminate\Http\RedirectResponse
	{
		Navigation::query()->findOrFail($id)->delete();

		return redirect()->route('admin.nav.index')->with('success', 'Навигационная ссылка удалена');
	}


	public function change_structure()
	{
		function changeStruct($data, $parent_id)
		{
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
		}

		changeStruct(request()->data, 0);
	}


	public function getNavigableGroups(Navigation $navigation)
	{
		$a=1;
		$groups = [
			Page::class => ['title' => 'Страницы', 'items' => Page::all(),],
			Service::class => ['title' => 'Услуги', 'items' => Service::all(),],
		];

		foreach ($groups as $className => $group) {
			$loopFirst = $className == array_key_first($groups);
			$groups[$className]['show'] = (!$navigation->exists && $loopFirst)
				|| ($navigation->exists &&
					(($navigation->navigable_type && $navigation->navigable_type == $className) || $loopFirst)
				);
		}

		return $groups;
	}


	private function getFillData()
	{
		$object_type = request('bind_to');
		$object_id = intval(request("bind_to_item.{$object_type}"));

		$fill = request()->only([
				'title',
			]) + [
				'position' => Navigation::max('position') + 1,
			];

		if (request('url_check') === '0') {
			$fill += [
				'navigable_id' => $object_id,
				'navigable_type' => $object_type,
				'url' => '',
			];
		} else {
			$fill += [
				'navigable_id' => null,
				'navigable_type' => null,
				'url' => request('url'),
			];
		}
		return $fill;
	}

}
