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

    <table>
        <tr>
            <td style="padding: 20px; font-size: 1.2rem; font-weight: bold;">
                Flight Name
            </td>
            <td style="padding: 20px; font-size: 1.2rem; font-weight: bold;">
                Airplane Name
            </td>
        </tr>
    @foreach ($all_flights_airplanes as $airplane)
        <tr>
            <td style="padding: 20px;">{{ $airplane->flight->name }}</td>
            <td style="padding: 20px;">{{ $airplane->name }}</td>
            <td>
                <form action="{{ route('flight_airplane_delete_asign', $airplane->id) }}" method="post">
                    @csrf
                    <input type="submit" value="BORRAR">
                </form>
            </td>
        </tr>
    @endforeach
  </table>

@endsection