<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaseModel;
use App\Models\Product;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;
use League\CommonMark\Node\Node;

class BaseCrudController extends Controller
{
	protected $model;
	protected $paginateQuantity = 10;
	protected $sortable = false;
	protected $viewDir = '';
	protected $routesDir = '';

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
//		dd(request()->all());
		$this->dataValidate();
		$item = $this->getItem($id);
		$item->fill($this->getFillData(__FUNCTION__));
		$item->save();

		$this->deleteImages($item);
		$this->saveImages($item);



		$this->afterSave($item, __FUNCTION__);

		return redirect()->route($this->getRouteName('edit'), $item->id)->with('success', 'Данные изменены');
	}

	public function store(): \Illuminate\Http\RedirectResponse
	{
		$this->dataValidate();
		$item = new $this->model;
		$item->fill($this->getFillData(__FUNCTION__));
		$item->save();
		$this->saveImages($item);
		$this->afterSave($item, __FUNCTION__);
		return redirect()->route($this->getRouteName('edit'), $item->id)->with('success', 'Запись добавлена');
	}

	public function afterSave($item, $method)
	{
		if ($method == 'store' && $item->useTrait(NodeTrait::class)) {
			$model = $this->getModel();
			$item->insertBeforeNode(
				with(new $model)->defaultOrder()->first()
			);
		}
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

	public function getFillData($method)
	{
		$data = request()->all();

		if ($this->sortable && $method == 'store') {
			$data['position'] = $this->getModel()::query()->max('position') + 1;
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

		if ($this->sortable) {
			return $query->get();
		} else {
			return $query->paginate($this->paginateQuantity);
		}

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

		return $query->sSorted('desc');
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

	public function getViewDir(): string
	{
		if ($this->viewDir)
			return $this->viewDir;

		return Str::plural($this->modelName());
	}

	protected function getViewPath($method): string
	{
		return "admin." . $this->getViewDir() . ".$method.$method";
	}

	public function getRouteDir(): string
	{
		if ($this->routesDir)
			return $this->routesDir;
		return Str::plural($this->modelName());
	}

	public function getRouteName($method): string
	{
		return "admin." . $this->getRouteDir() . ".$method";
	}

	public function getAction($action): string
	{
		return $this->getRouteName($action);
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
		$model = $this->getModel();
		/** @var BaseModel $modelItem */
		$modelItem = new $model;

		if ($modelItem->useTrait(NodeTrait::class))
			return $this->change_structure_nestable($model);

		$this->change_structure_default();
	}

	public function change_structure_nestable($model)
	{
		$model::rebuildTree(request('data'), []);
		return true;
	}

	public function change_structure_default()
	{
		function changeStruct($data, $parent_id, $model)
		{
			foreach ($data as $key => $value) {
				$position = count($data) - $key;
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


