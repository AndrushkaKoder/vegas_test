<?php

namespace Database\Seeders;

use App\Models\Params;
use Illuminate\Database\Seeder;

class ParamsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = include 'storage/seed/services/params.php';

		foreach ($data as $key => $value) {
			Params::query()->create([
				'name' => $key,
				'value' => $value
			]);
		}

	}
}
