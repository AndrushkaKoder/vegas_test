<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Seeder;

class NavSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = include 'storage/seed/navigations/navigations.php';

		foreach ($data as $item) {
			Navigation::query()->create([
				'title' => $item['title'],
				'url' => $item['url'],
				'parent_id' => $item['parent_id'],
				'position' => $item['position']
			]);
		}
	}
}
