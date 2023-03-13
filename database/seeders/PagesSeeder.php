<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PagesSeeder extends Seeder
{
	public function run()
	{
		Page::query()->delete();

		$data = include "storage/seed/pages/pages.php";

		foreach ($data as $item) {
			Page::query()->create(Arr::except($item, []));
		}
	}
}
