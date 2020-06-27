@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="d-flex justify-content-end">
    <a type="button" href="{{ route('clients.index', $client->id) }}" class="btn bg-btn-lightgreen m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $client->id }}"><i class="nav-icon fas fa-users"></i></a>
    <a type="button" href="{{ route('clients.edit', $client->id) }}" class="btn btn-blue m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $client->id}}"><i class="fas fa-pencil-alt"></i></a>
    @csrf @method('DELETE')
    <button type="submit"class="btn btn-danger m-1 text-white" name="btnBorrar" value="{{ $client->id }}"><i class="far fa-trash-alt"></i></button>
  </div>

  <div class="">
      <div class="container">
        <h1 class="display-4">{{$client->name}}</h1>
        <p class="lead">{{$client->email}}</p>
      </div>
  </div>
</div>
@endsection