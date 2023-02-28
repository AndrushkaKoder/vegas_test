<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Files;
use App\Models\Navigation;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Validation\Rule;
use function GuzzleHttp\Promise\all;

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
		$a=1;
		$groups = $this->groupsForNav();
		$action = 'admin.nav.update';
		$navigation = Navigation::query()->findOrFail($id);

//		dd($this->groupsForNav())
		return view('admin.nav.edit', compact('navigation', 'action', 'groups'));
	}


	public function create()
	{
		$action = 'admin.nav.store';
		$navigation = new Navigation();

		$groups = $this->groupsForNav();

		return view('admin.nav.edit', compact('navigation', 'groups', 'action'));
	}


	public function update($id): \Illuminate\Http\RedirectResponse
	{
		$navigation = Navigation::query()->findOrFail($id);

		$navigation->fill($this->addNavigationData());
		$navigation->save();
		return redirect()->route('admin.nav.edit', $navigation->id)->with('success', 'Данные о ссылке обновлены');
	}


	public function store(): \Illuminate\Http\RedirectResponse
	{
		request()->validate([
			'title' => 'required',
		]);

		$navigation = new Navigation();
		$navigation->fill($this->addNavigationData());
		$navigation->save();

		return redirect()->route('admin.nav.edit', $navigation->id)->with('success', 'Навигационная ссылка добавлена');
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

		};

		changeStruct(request()->data, 0);
	}


	public function groupsForNav()
	{
		return [
			Page::class => ['title' => 'Страницы', 'items' => Page::all(),],
			Service::class => ['title' => 'Услуги', 'items' => Service::all(),],
			//Feedback::class => ['title' => 'Фидбек', 'items' => Feedback::all(),],
		];

	}


	private function addNavigationData(){

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
