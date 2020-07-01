<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">
            
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                
                <!-- SEARCH FORM -->
                <!-- form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search"
                        aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form --> <!-- END SEARCH FORM -->
                
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown mx-1">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-comments mr-3"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-danger"><i
                                                class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">Call me whenever you can...</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                John Pierce
                                                <span class="float-right text-sm text-muted"><i
                                                    class="fas fa-star"></i></span>
                                                </h3>
                                                <p class="text-sm">I got your message bro</p>
                                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                            </div>
                                        </div>
                                        <!-- Message End -->
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                            <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                            class="img-size-50 img-circle mr-3">
                                            <div class="media-body">
                                                <h3 class="dropdown-item-title">
                                                    Nora Silvester
                                                    <span class="float-right text-sm text-warning"><i
                                                        class="fas fa-star"></i></span>
                                                    </h3>
                                                    <p class="text-sm">The subject goes here</p>
                                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                                </div>
                                            </div>
                                            <!-- Message End -->
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                                    </div>
                                </li>
                                <!-- Notifications Dropdown Menu -->
                                <li class="nav-item dropdown mx-1">
                                    <a class="nav-link" data-toggle="dropdown" href="#">
                                        <i class="far fa-bell mr-3"></i>
                                        <span class="badge badge-warning navbar-badge">15</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">
                                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                                            <span class="float-right text-muted text-sm">3 mins</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">
                                            <i class="fas fa-users mr-2"></i> 8 friend requests
                                            <span class="float-right text-muted text-sm">12 hours</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">
                                            <i class="fas fa-file mr-2"></i> 3 new reports
                                            <span class="float-right text-muted text-sm">2 days</span>
                                        </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ route('admin.index') }}" class="brand-link">
                    <img src="{{ asset('siteimg/solo_arbol.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
                    <span class="brand-text font-weight-bold text-white">{{ config('app.name') }}</span>
                </a>
                
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-1 pb-4 mb-1 d-flex">
                        <div class="image d-flex align-items-center py-0">
                            <img src="{{ asset('siteimg/usuario.png') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right p-0 bg-secondary text-center" aria-labelledby="navbarDropdown">
                                <a class="py-0" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link {{ setSelected('admin.index') }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>@lang('Home')</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('clients.index')}}"
                            class="nav-link {{ setSelected('clients.index') }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                @lang('Clients')
                                <?php
                                            use App\User;
                                            use App\Product;
                                            $clients_count = User::where('role_id', 3)->count();
                                            $employees_count = User::where('role_id', 2)->count();
                                            $products_count = Product::all()->count();
                                            ?>
                                        <span class="right badge bg-btn-lightgreen text-white">{{ $clients_count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{route('employees.index')}}"
                                    class="nav-link {{ setSelected('employees.index') }}">
                                    <i class="nav-icon fas fa-users-cog"></i>
                                    <p>
                                        @lang('Employees')
                                        
                                        <span class="right badge bg-btn-lightgreen text-white">{{ $employees_count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{route('products.index')}}"
                                class="nav-link {{ setSelected('products.index') }}">
                                <i class="nav-icon fas fa-seedling"></i>
                                <p>
                                    @lang('Products')
                                    
                                    <span class="right badge bg-btn-lightgreen text-white">{{ $products_count ?? '0' }}</span>
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-sticky-note"></i>
                                <p>Notas<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="notas/todas"
                                    class="{{ Request::path() === 'notas/todas' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Todas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="notas/favoritas"
                                class="{{ Request::path() === 'notas/favoritas' ? 'nav-link active' : 'nav-link' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Favoritas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="notas/archivadas"
                            class="{{ Request::path() === 'notas/archivadas' ? 'nav-link active' : 'nav-link' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Archivadas</p>
                        </a>
                    </li>
                </ul>
            </li>
            
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header)
        <div class="content-header">
            
        </div>
        /.content-header -->
        
        <!-- Main content -->
        <section class="content mt-3"> 
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-center">
        <!-- NO QUITAR -->
        <small>{{ config('app.name') }} | Copyright &copy; <?= date('Y') ?> Jorge Rodríguez</small>
        <small>(<a href="mailto:jarol72@gmail.com" class="text-gray">jarol72@gmail.com</a>)</small>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 2.0
        </div>
    </footer>
    
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
</div>
<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}" defer></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}" defer></script>
<script>  // https://eldesvandejose.com/2016/12/05/el-plugin-datatables-iv-mejorando-el-aspecto/
    $(document).ready( function () {
        $('#infTable').DataTable({
            "processing": true,
            "serverSide": true,
            "dom": 'Bfrtip',
            "buttons": [
                'copy', 'excel', 'pdf'
            ]
            "language": {
				"emptyTable":           "No hay datos disponibles en la tabla.",
				"info":                 "Del _START_ al _END_ de _TOTAL_ ",
				"infoEmpty":            "Mostrando 0 registros de un total de 0.",
				"infoFiltered":         "(filtrados de un total de _MAX_ registros)",
				"infoPostFix":          "(actualizados)",
				"lengthMenu":           "Mostrar _MENU_ registros",
				"loadingRecords":       "Cargando...",
				"processing":           "Procesando...",
				"search":               "Buscar:",
				"searchPlaceholder":    "Dato para buscar...",
				"zeroRecords":          "No se han encontrado coincidencias.",
				"paginate": {
					"first":			"Primera",
					"last":				"Última",
					"next":				"Siguiente",
					"previous":			"Anterior"
				},
				"aria": {
					"sortAscending":	"Ordenación ascendente",
					"sortDescending":	"Ordenación descendente"
				}
			},
			"lengthMenu":		[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
			"iDisplayLength":	10,
			"bJQueryUI":		false,
        });
} );
</script>
</body>

</html>