<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CategoriesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Category::query()->delete();

		$data = include storage_path('/seed/products/categories.php');
		foreach ($data as $d) {
			$this->makeCategory($d);
		}

	}

	public function makeCategory($data, $parent_id = 0)
	{
		$data['parent_id'] = $parent_id;
		$item = Category::query()->create(Arr::except($data, ['children']));

		if (isset($data['children'])) {
			foreach ($data['children'] as $child) {
				$this->makeCategory($child, $item->id);
			}
		}
	}
}
