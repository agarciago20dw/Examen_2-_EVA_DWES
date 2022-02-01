@extends('layouts.app')

@section('title', 'Flights Reserved')

@section('content')

  <h2>Reserved flights:</h2>

  <table>
    @foreach ($all_flights_reserved as $flight)
        <tr>{{ $flight->name }} </tr>
        <tr>{{ $flight->date }} </tr>
        <tr>{{ $flight->origin }} </tr>
        <tr>{{ $flight->destiny }} </tr>
        <tr>{{ $flight->available_seats }} </tr><br>
    @endforeach
  </table>

@endsection