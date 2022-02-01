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
        // \App\Models\User::factory(10)->create();
        $this->call([
            FlightSeeder::class,
            UserSeeder::class,
            AirPlaneSeeder::class,
            FlightsUsersSeeder::class,
        ]);
    }
}
