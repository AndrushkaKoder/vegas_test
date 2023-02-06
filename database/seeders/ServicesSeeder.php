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
        $data = include storage_path("seed/services/services.php");

        foreach ($data as $item){

            $service = Service::query()->create([
                'title' => $item['title'],
                'short_content' => $item['short_content'],
                'content' => $item['content'],
                'slug' => $item['slug']
            ]);

            $service->saveFile($imgName, $imgFilename);
        }



//         Service::query()->create(Arr::only($data, ['title', 'short_content', 'content', 'slug']));

//        foreach ($data['images'] as $imgName => $imgFilename) {
//            $imgFilename = public_path("_files/{$imgFilename}");
//            $item->saveFile($imgName, $imgFilename);
//        }
    }
}
