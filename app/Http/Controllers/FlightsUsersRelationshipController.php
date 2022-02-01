<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlightsUsersRelationshipController extends Controller
{
    public function show() {
        $all_flights = Flight::all();

        $all_flights_comming = [];

        for ($i=0; $i < count($all_flights); $i++) { 
            if ($all_flights[$i]->date > '2022-02-01') {
                array_push($all_flights_comming, $all_flights[$i]);
            }
        }

        return view('flights/index', ['all_flights_comming' => $all_flights_comming]);
    }

    public function asign(Request $request, $flight_id) {
        $request->validate([
            'num_plazas' => 'required',
        ]);

        $user = Auth::user();
        $flight = Flight::find($flight_id);

        if ($flight->available_seats - $request->num_plazas >= 0) {
            $flight->available_seats = $flight->available_seats - $request->num_plazas;
            $flight->save();
        }

        $flight->users()->attach($user);

        return redirect()->to(route('flight_user_show'));
    }
}
