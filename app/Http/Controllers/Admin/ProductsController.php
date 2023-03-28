<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;

class ProductsController extends BaseCrudController
{
	protected $model = Product::class;
	protected $paginateQuantity = 5;

	public function getValidationRules(): array
	{
		return [
			'title' => 'required',
		];
	}

	public function getParams($method, $item = null): array
	{
		$params = parent::getParams($method, $item);

		if (in_array($method, ['create', 'update', 'store', 'edit'])) {
			$params = [
				'categories' => Category::all()->toTree(),
				'vendors' => [0 => 'Не выбрано'] + Vendor::query()->pluck('title', 'id')->toArray(),
			];
		}

		return $params;
	}


	public function getFillData($method): array
	{
		$data = request()->all();
		if (request('discount_price') == '' ||
			(request('discount_date_start') == '' || request('discount_date_end') == '')) {
			$data['discount_price'] = null;
			$data['discount_date_start'] = null;
			$data['discount_date_end'] = null;
		}
		return $data;
	}


	public function afterSave($item, $method)
	{

		$item->categories()->sync(array_keys(request('category', [])));
		parent::afterSave($item, $method);

	}


}
