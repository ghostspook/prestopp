<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        City::create(['name' => 'Guayaquil']);
        City::create(['name' => 'Quito']);

        if (App::environment('local')) {
            \App\Models\Client::factory(20)->create();
        }

    }
}
