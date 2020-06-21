   <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
         <a class="navbar-brand" href="{{ route('admin.index') }}">
            {{ config('app.name') }}
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="nav nav-pills ml-auto">
               <li class="nav-item"><a class="nav-link {{ setActive('clients') }}" href="{{route('clients.index')}}">{{ __('Clients') }}</a></li>
               <li class="nav-item"><a class="nav-link {{ setActive('employees') }}" href="{{route('employees.index')}}">{{ __('Employees') }}</a></li>
               <li class="nav-item"><a class="nav-link {{ setActive('products') }}" href="{{route('products.index')}}">{{ __('Products') }}</a></li>
               <li class="nav-item"><a class="nav-link {{ setActive('invoices') }}" href="{{route('invoices.index')}}">{{ __('Invoices') }}</a></li>
               <li class="nav-item"><a class="nav-link {{ setActive('invoices') }}" href="{{ route('logout') }}
                                       "onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    </form>
               </li> 
            </ul>
         </div>
      </div>
   </nav>
