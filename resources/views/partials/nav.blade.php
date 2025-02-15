<nav class="main-nav py-0 bg-darkgreen sticky" id="navbar">
   <div class="container  navbar-expand-md navbar-dark text-white">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
         <ul class="navbar-nav mr-auto mt-lg-0 bg-menu">
            <li class="nav-item  {{ setActive('home') }}">
               <a class="nav-link text-white px-3" href="{{route('home')}}">@lang('Home')</a>
            </li>
            <li class="nav-item {{ setActive('catalog') }} {{ setActive('category_filter') }}">
               <a class="nav-link text-white px-3" href="{{route('catalog')}}">@lang('Catalog')</a>
            </li>
            <li class="nav-item {{ setActive('who') }}">
               <a class="nav-link text-white px-3" href="{{route('who')}}">@lang('About us')</a>
            </li>
            <li class="nav-item {{ setActive('contact') }}">
               <a class="nav-link text-white px-3" href="{{route('contact')}}">@lang('Contact')</a>
            </li>
            <li class="nav-item {{ setActive('help') }}">
               <a class="nav-link text-white px-3" href="{{route('help')}}">@lang('Help')</a>
            </li>
            
         </ul>

         <ul class="navbar-nav ml-auto bg-menu">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role_id == 1)
                                       <a class="dropdown-item" href="{{ route('admin.index') }}">
                                          {{ __('Admin Area') }}
                                       </a>
                                    @endif
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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