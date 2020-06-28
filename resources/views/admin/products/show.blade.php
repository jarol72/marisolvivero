@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="d-flex justify-content-end">
    <a type="button" href="{{ route('products.index', $product->id) }}" class="btn bg-btn-lightgreen m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $product->id }}"><i class="nav-icon fab fa-pagelines"></i></a>
    <a type="button" href="{{ route('products.edit', $product->id) }}" class="btn btn-blue m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $product->id}}"><i class="fas fa-pencil-alt"></i></a>
    @csrf @method('DELETE')
    <button type="submit"class="btn btn-danger m-1 text-white" name="btnBorrar" value="{{ $product->id }}"><i class="far fa-trash-alt"></i></button>
  </div>

  <div class="">
      <div class="container">
        <h1 class="display-4">{{$product->common_name}}</h1>
        <p class="lead text-danger"><i>{{$product->scientific_name}}</i></p>
        <p class="">@lang('Cost'): {{$product->cost}}</p>
        <p class="">@lang('Stock'): {{$product->stock}}</p>
      </div>
  </div>
</div>
@endsection