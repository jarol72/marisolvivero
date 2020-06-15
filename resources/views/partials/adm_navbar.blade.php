   <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="navbar">
      <div class="container">
         <a class="navbar-brand" href="{{ route('admin.index') }}">
            {{ config('app.name') }}
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="nav nav-pills ml-auto">
               <li class="nav-item"><a class="nav-link {{ setActive('clients') }}" href="{{route('clients.index')}}">Clientes</a></li>
               <li class="nav-item"><a class="nav-link {{ setActive('employees') }}" href="">Empleados</a></li>
               <li class="nav-item"><a class="nav-link {{ setActive('products') }}" href="">Productos</a></li>
               <li class="nav-item"><a class="nav-link {{ setActive('invoices') }}" href="">Facturas</a></li>
               <li class="nav-item"><a class="nav-link" href="">Salir</a></li>
               
            </ul>
         </div>
      </div>
   </nav>
