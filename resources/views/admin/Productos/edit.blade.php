@extends('layouts.app')

@section('title', 'Editar producto')

@section('content')
<div class="row">
   <div class="col-sm-6 mx-auto">
      <div class="card">
         <div class="card-header bg-menu text-white font-weight-bold">
            <h3>{{ __('Editar producto')}}</h3>
         </div>
         
         @include('partials._session-status')

         <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST">
               @method('patch')

               @include('products._form', ['btnText' => 'Actualizar'])

            </form>
         </div>
      </div>
   </div>
</div>
@endsection
