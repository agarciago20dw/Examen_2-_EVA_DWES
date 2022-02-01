@extends('layouts.app')

@section('title', 'Flights Reserved')

@section('content')

  <h2>Middleware explain</h2>

  <p>En este middleware la función 'handle' verifica si el usuario está suscrito (atributo boolean del usuario), si lo está la ejecución del programa seguirá su curso (con 'return $next($request)'), si no lo está se retornará un error 403.</p>

@endsection