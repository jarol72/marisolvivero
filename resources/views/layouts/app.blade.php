<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
   <script src="{{ asset('js/navbar.js') }}" defer></script>

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
   
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
   <link href="{{ asset('css/font.css') }}" rel="stylesheet">
   @yield('css')
</head>
<body>
   <div id="app">

      @include('partials.header')

      <main class="py-2 container-md content">
         @yield('content')
      </main>

      @include('partials.footer')

   </div>
   <script src="{{ asset('js/navbar.js') }}"></script>

</body>
</html>
