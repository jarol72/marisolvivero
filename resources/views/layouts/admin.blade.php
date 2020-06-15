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

   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
   <link href="{{ asset('css/font.css') }}" rel="stylesheet">
   @yield('css')
</head>
<body>
   <div id="app">
      <header>
         @include('partials.adm_navbar')
      </header>

      <main class="py-4 container-md content">
         @yield('content')
      </main>

      <footer class="bg-white text-center text-black-50 py-3 shadow">
         <small>{{ config('app.name') }} | Copyright &copy; <?= date('Y') ?> Jorge Rodríguez</small><br>
         <small><a href="mailto:jarol72@gmail.com"></a></small>
      </footer>
   </div>
   <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>
