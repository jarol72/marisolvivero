<div class="container">
<header class=" main-header w-100 position-relative">
   <div class=" row">
      <div class="col align-middle">
         <h1 class="logo"><a href="{{route('home')}}" class="text-white text-decoration-none">Marisol Vivero</a></h1>
      </div>
      <div class="main-header__contactInfo text-right">
         <p class="main-header__contactInfo__phone">
            <span class="icon-phone">+57 314 4217898</span>
         </p>
         <p class="main-header__contactInfo__address">
            <span class="icon-location">Corregimiento Santa Elena, Medellín, Ant.</span>
         </p>
      </div>
   </div>
</header>
</div>

@include('partials.nav')

<section class="banner position-relative">
   <img src="{{ asset('siteimg/banner.jpg') }}" class="banner__img" alt="banner">
   <div class="banner__content text-white text-center position-absolute">
      
         @yield('title')
         @auth
            @if(Route::Is('home'))
               {{ auth()->user()->name }}
            @endif
         @endauth
   </div>
</section>
