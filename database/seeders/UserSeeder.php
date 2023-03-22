<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::query()->delete();
		$data = include storage_path("/seed/user/user.php");

			User::query()->create($data);
	}
}
