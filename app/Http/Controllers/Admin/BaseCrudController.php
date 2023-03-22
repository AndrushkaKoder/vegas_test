<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class BaseCrudController extends Controller
{
	protected $model;
	protected $paginateQuantity = 10;
	protected $sortable = false;

	public function index()
	{
		$items = $this->getItems();
		$filterData = $this->getFilterData();
		$sortData = $this->getSortData();

		$params = $this->getParams(__FUNCTION__);

		return view($this->getViewPath('index'), compact('items', 'filterData', 'params', 'sortData'));
	}

	public function show(int $id)
	{
		$item = $this->getItem($id);

		$this->afterShow($item);

		$params = $this->getParams(__FUNCTION__, $item);
		return view($this->getViewPath('show'), compact('item', 'params'));
	}

	public function afterShow($item)
	{
		return true;
	}

	public function create()
	{
		$item = new $this->model;
		$action = $this->getAction('store');
		$method = 'POST';

		$params = $this->getParams(__FUNCTION__, $item);

		return view($this->getViewPath('edit'), compact('item', 'action', 'method', 'params'));
	}

	public function edit(int $id)
	{
		$item = $this->getItem($id);
		$action = $this->getAction('update');
		$method = 'GET';

		$params = $this->getParams(__FUNCTION__, $item);

		return view($this->getViewPath('edit'), compact('item', 'action', 'method', 'params'));
	}

	public function update(int $id): \Illuminate\Http\RedirectResponse
	{
		$this->dataValidate();
		$item = $this->getItem($id);
		$item->fill($this->getFillData());
		$item->save();

		$this->deleteImages($item);
		$this->saveImages($item);

		return redirect()->route($this->getRouteName('edit'), $item->id)->with('success', 'Данные изменены');
	}

	public function store(): \Illuminate\Http\RedirectResponse
	{
		$this->dataValidate();
		$item = new $this->model;
		$item->fill($this->getFillData());
		$item->save();
		$this->saveImages($item);

		return redirect()->route($this->getRouteName('edit'), $item->id)->with('success', 'Запись добавлена');
	}

	public function destroy(int $id): \Illuminate\Http\RedirectResponse
	{
		$this->getItem($id)->delete();

		return redirect()->route($this->getRouteName('index'))->with('success', 'Запись удалена');
	}

	public function getModel()
	{
		return $this->model;
	}

	public function getItem($id)
	{
		return $this->model::findOrFail($id);
	}

	public function getFillData()
	{
		$data = request()->all();

		if ($this->sortable) {
			$data['position'] = $this->getModel()::query()->orderBy('position', 'desc')->first()->position +1;
			// Если есть связь, то сортируем по position desc
		}

		return $data;
	}

	public function getParams($method, $item = null)
	{
		return [];
	}

	public function getItems()
	{
		$query = $this->getQuery();
		$query = $this->filterItems($query);
		$query = $this->searchItems($query);
		$query = $this->sortItems($query);

		return $query->paginate($this->paginateQuantity);
	}

	public function getQuery()
	{
		return $this->model::query();
	}

	public function sortItems($query)
	{
		if (request()->has('sort')) {
			foreach ($this->getSortData() as $sortData) {
				$value = request('sort');
				if ($value >= 0) {
					$sortData['callback']($query, $value);
				}
			}
		} else {
			if (isset($sortData['default_selected'])) {
				$sortData['callback']($query, $sortData['default_selected']);
			}
		}

		return $query->sSorted('desc'); // передан параметр
	}

	public function filterItems($query)
	{
		foreach ($this->getFilterData() as $filterData) {
			if (request()->filled($filterData['name'])) {
				$value = request($filterData['name']);
				if ($value >= 0) {
					$filterData['callback']($query, $value);
				}
			} else {
				if (isset($filterData['default_selected'])) {
					$filterData['callback']($query, $filterData['default_selected']);
				}
			}
		}

		return $query;
	}

	public function searchItems($query)
	{
		if (request()->filled('search')) {
			$query->sHasSearch(request('search'));
		}
		return $query;
	}

	public function getFilterData()
	{
		return [];
	}

	public function getSortData()
	{
		return [];
	}

	public function toggle_param($id, $param)
	{
		$item = $this->model::query()->findOrFail($id);
		$value = 1 - $item->getAttribute($param);
		$item->update([$param => $value]);
		return compact('value');
	}

	private function modelName(): string
	{
		return Str::lower(Str::remove('App\\Models\\', $this->getModel()));
	}

	protected function getViewPath($method): string
	{
		$dir = $this->modelName();
		return "admin.$dir.$method.$method";
	}

	public function getRouteName($method): string
	{
		$dir = $this->modelName();
		return "admin.$dir.$method";
	}

	public function getAction($action): string
	{
		return "admin." . $this->modelName() . ".$action";
	}

	public function dataValidate()
	{
		if ($rules = $this->getValidationRules())
			request()->validate($rules);
	}

	public function getValidationRules()
	{
		return [];
	}

	public function saveImages($item)
	{
		if (request()->has('files_image'))
			foreach ((array)request()->file('files_image') as $name => $obj) {
				$item->saveFile($name, $obj);
			}
	}

	public function deleteImages($item)
	{
		if (request()->has('delete_files')) {
			foreach (request('delete_files') as $key => $value) {
				if ($value === "1") {
					$item->deleteFile($key);
				}
			}
		}
	}

	public function change_structure()
	{
		function changeStruct($data, $parent_id, $model)
		{
			foreach ($data as $key => $value) {
				$position = $key;
				$id = $value['id'];

				$update = [
					'position' => $position,
				];

				$modelItem = new $model;
				if ($modelItem->isFillable('parent_id')) {
					$update['parent_id'] = $parent_id;
				}

				$model::query()->where('id', $id)->update($update);

				if (isset($value['children']) && !empty($value['children'])) {
					changeStruct($value['children'], $id, $model);
				}
			}
		}

		changeStruct(request()->data, 0, $this->getModel());
	}

}


