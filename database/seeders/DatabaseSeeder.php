<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Client;
use App\Models\Provider;
use App\Models\Task;
use App\Models\User;
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
            User::create(['name'=>'sysadmin', 'email'=>'sysadmin@prestopp.com', 'password'=>bcrypt('secret'), 'email_verified_at' => now()]);

            Client::factory(20)->create();
            Provider::factory(10)->create();
            Task::factory(40)->create();
        }

    }
}
