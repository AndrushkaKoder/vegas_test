<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Service;
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

        // \App\Models\User::factory(10)->create();

    }
}
