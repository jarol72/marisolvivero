@extends('layouts.app')

@section('title', 'Bienvenido(a)')

@section('content')
   <section class=" mb-4 ">
      <div class="jumbotron w-75 m-auto bg-darkgreen text-white p-3 md">
         <h2 class="info-title text-center"><b>Espacio para mensajes de interés</b></h2>
         <p class="text-justify mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo enim corrupti laborum aperiam exercitationem cumque earum blanditiis odio inventore dolores, reiciendis, iusto quas alias! Aliquid neque, ratione corrupti qui sequi.</p>
      </div>
   </section>

<div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 justify-content-between">
   @forelse($categories as $category)

      <div class="col mb-4 card-deck">
         <div class="card border-card">
            <div class="card-header bg-btn-lightgreen text-white text-center">
               <b>
                  <p class="category-title">
                     <a href="{{route('category_filter', $category->id)}}" class="text-white text-decoration-none text-uppercase">{{$category->category}}</a>
                  </p>
               </b>
            </div>

            <div class="card-body p-0">
               <img src='{{asset("siteimg/$category->image")}}' class="card-img rounded-0 w-100 h-100" />
            </div>
         </div>
      </div>

   @empty
      <!-- /div>
         <div class='card'>
            <div class="card-body">
               <p>No hay categorías para mostrar</p>
            </div>
         </div>
      </div -->
   @endforelse
</div>
   @endsection
