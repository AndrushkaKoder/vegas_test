<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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

        foreach ($data as $item) {
            /** @var Service $service */
            $service = Service::query()->create([
                'title' => $item['title'],
                'short_content' => $item['short_content'],
                'content' => $item['content'],
            ]);

            foreach ($item['images'] as $name => $filename) {
                if (mb_strpos($filename, 'https://') !== 0)
                    $filename = storage_path("seed/services/files/$filename");

                $service->saveFile($name, $filename);  //inner, D:/OpenServer/domains/vegas/public/files/avto.jpg
            }
        }
    }

}
