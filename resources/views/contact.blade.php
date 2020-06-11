@extends('layouts.app')

@section('title', 'Contáctenos')

@section('content')

<div class="container">
   <h3 class="font-weight-bold text-center mb-4">Permítenos conocer tus necesidades</h3>
   <div class="row">
      <div class="col-sm">
         <h4 class="font-weight-bold text-center mb-4">¡Visita nuestras instalaciones!</h4>

         <!-- Mapa con la ubicación del negocio -->
         <div class="bg-darkgreen p-1">
         <div class="embed-responsive embed-responsive-16by9 border-darken-2">
            <iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7932.080597661703!2d-75.49732850826226!3d6.258422114642495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e44264533e5f74d%3A0x21be267cbc925d2e!2sMarisol%20Vivero!5e0!3m2!1ses!2sco!4v1568155754764!5m2!1ses!2sco" allowfullscreen="true"></iframe>
         </div>
         </div>
         <!-- Enlaces a redes sociales -->
         <div class="column mt-3">
            <p><a href="" class="social-icon__link"><span class="icon-facebook"></span> Facebook</a></p>
            <p><a href="" class="social-icon__link"><span class="icon-twitter"></span> Síguenos en Twitter</a></p>
            <p><a href="" class="social-icon__link"><span class="icon-mail"></span> Correo electrónico</a></p>
         </div>
      </div>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

      <div class="col-sm">
         <div class="card">
            <div class="card-header bg-menu text-white font-weight-bold">
               <h3>{{ __('Déjanos tu mensaje')}}</h3>
            </div>

            @include('partials._session-status')

            <div class="card-body">
               <form action="{{ route('message.store') }}" method="POST">
                  @csrf
                  <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label">{{__('Nombre')}}</label>
                     <div class="col-sm-8">
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                        {!! $errors->first('name', '<small>:message</small>') !!}
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="email" class="col-sm-4 col-form-label">{{__('Correo')}}</label>
                     <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                        {!! $errors->first('email', '<small>:message</small>') !!}
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="subject" class="col-sm-4 col-form-label">{{__('Asunto')}}</label>
                     <div class="col-sm-8">
                        <input type="text" name="subject" class="form-control" id="subject" value="{{ old('subject') }}">
                        {!! $errors->first('subject', '<small>:message</small>') !!}
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="message" class="col-sm-4 col-form-label">{{__('Mensaje')}}</label>
                     <div class="col-sm-8">
                        <textarea name="message" class="form-control" id="message" cols="30" rows="5">{{ old('message') }}</textarea>
                        {!! $errors->first('message', '<small>:message</small>') !!}
                     </div>
                  </div>
                  <div class="form-group row align-content-end mb-0">

                     <div class="mx-auto">
                        <button type="submit" class="btn bg-btn-lightgreen text-white">Enviar mensaje</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection
