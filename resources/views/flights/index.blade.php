@extends('layouts.app')

@section('title', 'Flights')

@section('content')

  <h2>Coming flights:</h2>

  <table>
    <tr>
      <td style="padding: 20px; font-size: 1.2rem; font-weight: bold;">Name</td>
      <td style="padding: 20px; font-size: 1.2rem; font-weight: bold;">Date</td>
      <td style="padding: 20px; font-size: 1.2rem; font-weight: bold;">Origin</td>
      <td style="padding: 20px; font-size: 1.2rem; font-weight: bold;">Destiny</td>
      <td style="padding: 20px; font-size: 1.2rem; font-weight: bold;">Available Seats</td>
    </tr>
    @foreach ($all_flights_comming as $flight)
      <tr>
        <td style="padding: 20px;">{{ $flight->name }}</td>
        <td style="padding: 20px;">{{ $flight->date }}</td>
        <td style="padding: 20px;">{{ $flight->origin }}</td>
        <td style="padding: 20px;">{{ $flight->destiny }}</td>
        <td style="padding: 20px;">{{ $flight->available_seats }}</td>
        <td>
          <form action="{{ route('flight_user_asign', $flight->id) }}" method="post">
            @csrf
            <input type="number" name="num_plazas">
            <input type="submit" value="RESERVAR">
          </form>
        </td>
      </tr>
    @endforeach
  </table>

@endsection
