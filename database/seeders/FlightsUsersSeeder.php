<?php

namespace Database\Seeders;

use App\Models\Flight;
use App\Models\User;
use Illuminate\Database\Seeder;

class FlightsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flight = Flight::find(1);
        $user = User::find(2);
        $flight->users()->attach($user);

        $flight = Flight::find(2);
        $user = User::find(3);
        $flight->users()->attach($user);

        $flight = Flight::find(3);
        $user = User::find(4);
        $flight->users()->attach($user);
    }
}
