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
			$slider = Slider::query()->create(Arr::except($item, ['image']));

			foreach ($item['image'] as $name => $filename){
				$filename = storage_path("seed/slider/files/$filename");
				$slider->saveFile($name, $filename);
			}
		}


	}
}
