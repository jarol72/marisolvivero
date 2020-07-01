@extends('layouts.admin')

@section('title', 'Área Administrativa')

@section('content')
   <div class="container text-center">
      <h1>Área Administrativa</h1>
      <h3>Bienvenido(a) {{ auth()->user()->name }}</h3>
      <p><b>(Perfil:</b> {{ auth()->user()->role['role'] }})</p>
   </div>
@endsection