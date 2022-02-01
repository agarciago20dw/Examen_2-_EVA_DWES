<?php

namespace App\Http\Controllers;

use App\Models\airplane;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightsAirplanesRelationshipController extends Controller
{
    public function show() {
        $all_flights = Flight::all();
        $all_airplanes = airplane::all();

        return view('airplane_flight_relationship', ['all_flights' => $all_flights, 'all_airplanes' => $all_airplanes]);
    }

    public function asign(Request $request) {
        $flight = Flight::find($request->flight);
        $airplane = airplane::find($request->airplane);

        $airplane->flight_id = $flight->id;
        $airplane->save();

        return redirect()->to(route('flight_airplane_show'));
    }
}
