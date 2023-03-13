<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ServicesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Service::query()->delete();
		$data = include storage_path("/seed/services/services.php");

		foreach ($data as $i => $item) {
			/** @var Service $service */
			$service = Service::query()->create(Arr::except($item, [
					'images',
				] + [
					'position' => $i
				]));

			foreach ($item['images'] as $name => $filename) {
				if (mb_strpos($filename, 'https://') !== 0)
					$filename = storage_path("seed/services/files/$filename");

				$service->saveFile($name, $filename);  //inner, D:/OpenServer/domains/vegas/public/files/avto.jpg
			}
		}
	}

}
