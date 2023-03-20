<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class SliderSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Slider::query()->delete();
		$data = include storage_path("/seed/slider/slider.php");

		foreach ($data as $item){
			Slider::query()->create($item);
		}
	}
}
