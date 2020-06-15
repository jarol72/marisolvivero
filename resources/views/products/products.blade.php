@extends('layouts.app')

@section('title', 'Catálogo de productos')

@section('content')
<div class="container">
   <div class="row d-flex mt-2 mb-4 justify-content-center">
      <a href="{{route('products.index')}}" class="btn btn-cat-filter bg-btn-lightgreen m-1 text-white {{(request('id') == null) ? 'active' : ''}}">Todos</a>
      @forelse($categories as $category)
      <a href="{{route('category_filter', $category->id)}}" class="btn btn-cat-filter bg-btn-lightgreen m-1 text-white {{(request('id') == $category->id) ? 'active' : ''}}">{{$category->category}}</a>
      @empty
      Sin datos
      @endforelse
   </div>

   @include('partials._session-status')
            
   <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 justify-content-between">
      @forelse($products as $product)

      <div class="col mb-4 card-deck col-sm">
         <div class="card border-card">
            <div class='bg-btn-green text-white text-center text-uppercase py-2'>
               <b>{{$product->common_name}}</b>
            </div>

            <div><img src='{{asset("productsimg/$product->image")}}' class="card-img rounded-0" /></div>
            <div class="card-body px-2 py-0">
               <p class="mt-0 mb-2 card-subtitle text-center text-danger"><i>{{$product->scientific_name}}</i></p>
               <p class="my-0"><small class="card-text"><b>Vlr. unitario: </b>{{number_format($product->cost,0,',','.')}}</small></p>
               <p class="my-0"><small class="card-text"><b>Disponible: </b>{{$product->stock}}</small></p>
               <p class="my-0"><small class="card-text"><b>Categoría: <a href="{{route('category_filter', $category->id)}}" class="">{{$product->category->category}}</a></b></small></p>
               <form action="" class="my-2">
                  <p class="my-0"><small class="card-text"><b>Cantidad a comprar: </b></small></p>
                  <div class="form-group align-items-baseline d-flex m-0">
                     <input class="form-control form-control-sm w-50 mr-2" type="number" placeholder="">
                     <button type="submit" class="btn bg-btn-lightgreen text-white btn-sm my-2">Agregar</button>
                  </div>
               </form>
               <a href="{{ route('products.edit', $product->id)}}">Editar</a>
               <form action="{{ route('products.destroy', $product) }}" method="POST">
               @csrf @method('delete')
               <button>Eliminar</button>
               </form>
            </div>
         </div>
      </div>
   @empty
   <!-- div class='card'>
      <div class="card-body">
         <p>No hay productos para mostrar</p>
      </div>
   </div -->
   @endforelse

   </div>
   <!-- Enlaces de paginación -->
   <div class="row m-auto justify-content-center">
      {{$products->links()}}

   </div>
   @endsection
