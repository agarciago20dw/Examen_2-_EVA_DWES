<?php

namespace App\Http\Controllers;

use App\Models\Flight;

class FlightsController extends Controller
{
    public function show() {
        $all_flights = Flight::all();
        $all_flights_reserved = [];

        for ($i=0; $i < count($all_flights); $i++) { 
            if (count($all_flights[$i]->users) > 0) {
                array_push($all_flights_reserved, $all_flights[$i]);
            }
        }

        return view('all_flights_reserved')->with('all_flights_reserved', $all_flights_reserved);
    }
}
