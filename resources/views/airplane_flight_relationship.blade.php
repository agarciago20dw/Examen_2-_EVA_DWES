@extends('layouts.app')

@section('title', 'Flights Reserved')

@section('content')

    <h2>All flights:</h2>

    <form action="{{ route('flight_airplane_asign') }}" method="post">
        @csrf
        <select name="flight" id="flight">
            @foreach ($all_flights as $flight)
                <option value="{{ $flight->id }}">{{ $flight->name }}</option>
            @endforeach
        </select>

        <h2>All Airplanes:</h2>

        <select name="airplane" id="airplane">
            @foreach ($all_airplanes as $airplane)
                <option value="{{ $airplane->id }}">{{ $airplane->name }}</option>
            @endforeach
        </select>

        <input type="submit" value="ASIGNAR">
    </form>

@endsection