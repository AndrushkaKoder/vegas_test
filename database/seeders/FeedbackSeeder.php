<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = include 'storage/seed/feedback/feedback.php';

		foreach ($data as $item){

			Feedback::query()->create([
				'user_name' => $item['user_name'] ,
				'user_phone' => $item['user_phone'],
				'user_email' => $item['user_email'],
				'user_data' => $item['user_data'],
				'feedback_type_id' => $item['feedback_type_id']
			]);

		}
    }
}
