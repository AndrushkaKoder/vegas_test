<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ProductsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Product::query()->delete();

		$files = File::files(storage_path("seed/products/parsed"));

		foreach ($files as $file) {
			$item = include $file;
			$item['vendor_id'] = $this->getVendor($item['vendor'])->id;
			$product = Product::query()->updateOrCreate(Arr::except($item, ['images', 'vendor', 'categories']));

			if (!empty($item['categories'])) {
				foreach ($item['categories'] as $category) {
					if ($cat = $this->getCategory($category))
						$product->categories()->attach($cat->id);
				}
			}

			$this->saveImages($item['images'], $product);
		}
	}


	public function getCategory($name)
	{
		$titles = explode('//', $name);
		$titles = array_filter($titles);

		$category = null;
		foreach ($titles as $i => $categoryTitle) {
			if ($i == 0) {
				$category = Category::firstOrCreate(['title' => $categoryTitle, 'parent_id' => null]);
			} else {
				$category = $category->children()->firstOrCreate(['title' => $categoryTitle]);
			}
		}

		return $category;
	}

	public function getVendor($title)
	{
		$title = Str::ucfirst($title);
		return Vendor::query()->firstOrCreate(['title' => $title]);
	}


	public function saveImages($array, $object)
	{
		foreach ($array as $name => $filename) {
			if (mb_strpos($filename, 'https://') !== 0)
				$fileName = storage_path("seed/products/files/$filename");

			$object->saveFile($name, $fileName);  //inner, D:/OpenServer/domains/vegas/public/files/avto.jpg
		}
	}
}
