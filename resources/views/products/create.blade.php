@extends('layouts.app')

@section('title', 'Registrar nuevo producto')

@section('content')
<div class="row">
   <div class="col-sm-6 mx-auto">
      <div class="card">
         <div class="card-header bg-menu text-white font-weight-bold">
            <h3>{{ __('Registrar nuevo producto')}}</h3>
         </div>
         
         @include('partials._session-status')

         <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">

               @include('products._form', ['btnText' => 'Guardar'])

            </form>
         </div>
      </div>
   </div>
</div>
@endsection
