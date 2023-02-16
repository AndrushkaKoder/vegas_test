<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = include "storage/seed/pages/pages.php";

		foreach ($data as $item){
			Page::query()->create([
				'uri' => $item['uri'],
				'title' => $item['title'],
				'seo_title' => $item['seo_title'],
				'seo_description' => $item['seo_description'],
				'seo_keywords' => $item['seo_keywords'],
				'content' => $item['content']
			]);
		}
    }
}
