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

        $all_flights_airplanes = [];

        for ($i=0; $i < count($all_airplanes); $i++) { 
            if ($all_airplanes[$i]->flight != null) {
                array_push($all_flights_airplanes, $all_airplanes[$i]);
            }
        }

        return view('airplane_flight_relationship', ['all_flights' => $all_flights, 'all_airplanes' => $all_airplanes, 'all_flights_airplanes' => $all_flights_airplanes]);
    }

    public function asign(Request $request) {
        $flight = Flight::find($request->flight);
        $airplane = airplane::find($request->airplane);

        $airplane->flight_id = $flight->id;
        $flight->available_seats = $flight->available_seats - $airplane->seats;
        $airplane->save();

        return redirect()->to(route('flight_airplane_show'));
    }

    public function deleteAsign($airplane_id) {
        $airplane = airplane::find($airplane_id);

        $airplane->flight_id = null;
        $airplane->save();

        return redirect()->to(route('flight_airplane_show'));
    }
}
