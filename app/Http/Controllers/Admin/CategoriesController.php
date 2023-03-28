<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;

class CategoriesController extends BaseCrudController
{
	protected $model = Category::class;
	protected $paginateQuantity = 10;
	protected $sortable = true;

	public function getValidationRules(): array
	{
		return [
			'title' => 'required'
		];
	}

	public function getItems()
	{
		$query = $this->getQuery();
		$query = $this->filterItems($query);
		$query = $this->searchItems($query);
		$query = $this->sortItems($query);

		return $query->defaultOrder()->get()->toTree();
	}

}
