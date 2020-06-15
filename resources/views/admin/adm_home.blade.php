@extends('layouts.admin')

@section('title', 'Área Administrativa')

@section('content')
   <div class="container text-center">
      <h1>Bienvenido al Área Administrativa</h1>
      <h3>Te has registrado como {{ auth()->user()->name }}</h3>
      <p>({{ auth()->user()->role['role'] }})</p>
   </div>
@endsection