<nav class="main-nav py-0 bg-darkgreen" id="navbar">
   <div class="container  navbar-expand-lg navbar-dark text-white">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
         <ul class="navbar-nav mr-auto mt-2 mt-lg-0 bg-menu">
            <li class="nav-item px-1  {{ setActive('home') }}">
               <a class="nav-link text-white" href="{{route('home')}}">@lang('Inicio')</a>
            </li>
            <li class="nav-item px-1 {{ setActive('products.index') }} {{ setActive('category_filter') }}">
               <a class="nav-link text-white" href="{{route('products.index')}}">@lang('Productos')</a>
            </li>
            <li class="nav-item px-1 {{ setActive('who') }}">
               <a class="nav-link text-white" href="{{route('who')}}">@lang('Quiénes somos')</a>
            </li>
            <li class="nav-item px-1 {{ setActive('contact') }}">
               <a class="nav-link text-white" href="{{route('contact')}}">@lang('Contacto')</a>
            </li>
            <li class="nav-item px-1 {{ setActive('help') }}">
               <a class="nav-link text-white" href="{{route('help')}}">@lang('Ayuda')</a>
            </li>
            @if (Route::has('login'))

            @auth
            <li class="nav-item px-1 {{ setActive('home') }}">
               <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
            </li>
            @else
            <li class="nav-item px-1 {{ setActive('login') }}">
               <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item {{ setActive('register') }}">
               @if (Route::has('register'))
               <a class="nav-link text-white" href="{{ route('register') }}">Registro</a>
               @endif
            </li>
            @endauth

            @endif
         </ul>
         <!-- Enlaces a redes sociales -->
         <div class="social-icon">
            <a href="" class="social-icon__link text-decoration-none"><span class="icon-facebook"></span></a>
            <a href="" class="social-icon__link text-decoration-none"><span class="icon-twitter"></span></a>
            <a href="" class="social-icon__link text-decoration-none"><span class="icon-mail"></span></a>
         </div>
      </div>
   </div>
</nav>