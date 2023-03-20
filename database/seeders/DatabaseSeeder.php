<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(ServicesSeeder::class);
		$this->call(AdminSeeder::class);
		$this->call(ParamsSeeder::class);
		$this->call(FeedbackSeeder::class);
		$this->call(FeedBackTypesSeeder::class);
		$this->call(PagesSeeder::class);
		$this->call(NavSeeder::class);
		$this->call(SliderSeeder::class);

	}
}
