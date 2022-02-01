<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'enunciado');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\FlightsController::class, 'show'])->name('flights_show');

Route::get('/flights/airplanes/show', [App\Http\Controllers\FlightsAirplanesRelationshipController::class, 'show'])->name('flight_airplane_show');

Route::post('/flights/airplanes/asign', [App\Http\Controllers\FlightsAirplanesRelationshipController::class, 'asign'])->name('flight_airplane_asign');