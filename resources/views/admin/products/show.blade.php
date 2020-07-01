@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="d-flex justify-content-end mb-4">
    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
      <a type="button" href="{{ route('products.index', $product->id) }}" class="btn bg-btn-lightgreen m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $product->id }}"><i class="nav-icon fab fa-pagelines"></i></a>
      <a type="button" href="{{ route('products.edit', $product->id) }}" class="btn btn-blue m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $product->id}}"><i class="fas fa-pencil-alt"></i></a>
      @csrf @method('DELETE')
      <button type="submit"class="btn btn-danger m-1 text-white" name="btnBorrar" value="{{ $product->id }}"><i class="far fa-trash-alt"></i></button>
    </form>
  </div>

  <div class="d-flex justify-content-between">
    <div class="container">
      <h1 class="display-4">{{$product->common_name}}</h1>
      <p class="lead text-danger"><i>{{$product->scientific_name}}</i></p>
      <p class="">@lang('Cost'): $ {{ number_format($product->cost, 0, ',', '.') }}</p>
      <p class="">@lang('Stock'): {{$product->stock}}</p>
    </div>
    <div class="col col-6 text-center">
        <img src="{{ asset('siteimg/silueta_planta.png') }}" class="" height="200" alt="">
    </div>
  </div>
</div>
@endsection