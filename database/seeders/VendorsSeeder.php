<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = include storage_path('/seed/products/vendor.php');

		foreach ($data as $item){
			Vendor::query()->create([
				'title' => $item['title'],
				]);
		}
	}
}
