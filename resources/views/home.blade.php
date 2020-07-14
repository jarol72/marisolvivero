@extends('layouts.app')

@section('title', 'Bienvenido(a)')

@section('content')
   <section class=" mb-4 ">
      <div class="jumbotron w-75 m-auto bg-darkgreen text-white p-3 md">
         <h2 class="info-title text-center"><b>Espacio para mensajes de interés</b></h2>
         <p class="text-justify mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo enim corrupti laborum aperiam exercitationem cumque earum blanditiis odio inventore dolores, reiciendis, iusto quas alias! Aliquid neque, ratione corrupti qui sequi.</p>
      </div>
   </section>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 justify-content-center">
   @foreach($categories as $category)

      <div class="col mb-4 card-deck">
         <div class="card border-card">
            <a href="{{route('category_filter', $category->id)}}" class="text-white text-decoration-none text-uppercase">
               <div class="card-header bg-btn-lightgreen text-white text-center">
                  <b>
                     <p class="category-title">
                        {{$category->category}}
                     </p>
                  </b>
               </div>
            </a>

            <div class="card-body p-0">
               <a href="{{route('category_filter', $category->id)}}">
                  <img src='{{asset("siteimg/$category->image")}}' class="card-img rounded-0 w-100 h-100" />
               </a>
            </div>
         </div>
      </div>
   
   @endforeach
</div>
<div>
   <p class="h2 font-weight-bold text-center mt-3">Productos Destacados</p>
</div>
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 justify-content-center">
   @foreach($products as $product)
   <div class="mt-5">
      @if($product->image)
         <div class="text-center">
            <img src="{{ route('home-products.image', $product->image) }}" class="" height="100" alt="">
         </div>
      @endif
      <div class="text-center m-0 p-0"><small>{{ $product->common_name }}</small></div>
      <div class="text-center m-0 p-0 text-danger"><small>{{ $product->scientific_name }}</small></div>
   </div>
   @endforeach
</div>
@endsection
