<?php

namespace Database\Seeders;

use App\Models\FeedbackType;
use Illuminate\Database\Seeder;

class FeedBackTypesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = include 'storage/seed/feedback/feedbackTypes.php';

		foreach ($data as $item) {

			FeedbackType::query()->create([
				'title' => $item
			]);

		}

	}
}
