@extends('layouts.admin')

@section('content')

<div class="container">
   <h2 class="text-center text-bold">@lang('Products')</h2>
   <div class="d-flex justify-content-between align-items-center mb-1 ml-0">
      {{-- @include('partials._searchForm') --}}
      
      <!-- BOTONES PARA FILTROS POR CATEGORÍA -->
      <div class="d-flex mt-3 mb-2 btn-group-justified p-0">
         <span class="mr-2 text-bold align-self-center">Filtrar: </span>
         <a href="{{route('products.index')}}" class="btn btn-sm btn-cat-filter bg-btn-lightgreen  ml-0 text-white {{(request('id') == null) ? 'active' : ''}}">Todos</a>
         @forelse($categories as $category)
         <a href="{{route('adm_category_filter', $category->id)}}" class="btn btn-sm btn-cat-filter bg-btn-lightgreen ml-1 border-left text-white {{(request('id') == $category->id) ? 'active' : ''}}">{{$category->category}}</a>
         @empty
         Sin datos
         @endforelse
      </div> <!-- FIN BOTONES PARA FILTROS POR CATEGORÍA -->

      <div class="d-flex mt-3 mb-2 btn-group-justified p-0">   
         <!-- Exportar a XLS -->
         <a href="{{ route('products.xls') }}" class="float-right mr-3"><button type="button" class="btn btn-sm float-right p-0" style="color: #217346" data-toggle="tooltip" data-placement="bottom" title="Exportar a Excel"><i class="far fa-file-excel fa-2x"></i></button></a>
         
         <!-- Exportar a PDF -->
         <a href="{{ route('products.pdf') }}" class="float-right mr-3"><button type="button" class="btn btn-sm text-danger  float-right p-0" data-toggle="tooltip" data-placement="bottom" title="Exportar a PDF"><i class="far fa-file-pdf fa-2x"></i></button></a>
         
         <!-- Botón nuevo usuario -->
         <a href="{{ route('products.create') }}" class="float-right"><button type="button" class="btn btn-sm bg-btn-lightgreen text-white float-right"><i class="fas fa-user-plus"></i> @lang('New product')</button></a>
      </div>   
   </div>   


   
   <div class="content mt-1">
      <div id="divTable" class="table-responsive">
         <table id="infTable" class="display table table-hover table-striped responsive nowrap">
            <thead>
               <tr class="bg-btn-lightgreen text-white">
                  <!-- th>Id</th -->
                  <th class="align-middle py-2">@lang('Category')</th>
                  <th class="align-middle py-2">@lang('Common Name')</th>
                  <th class="align-middle py-2">@lang('Scientfic Name')</th>
                  <th class="align-middle py-2 text-right">@lang('Cost')</th>
                  <th class="align-middle py-2 text-center">@lang('Stock')</th>
                  <th class="align-middle py-2 text-center">@lang('Actions')</th>
               </tr>
            </thead>
            <tbody>
               @forelse ($products as $product)
               <tr class="align-items-center">
                  <!-- td>{{ $product->id }}</td -->
                  <td class="align-middle py-0">{{ $product->category->category }}</td>
                  <td class="align-middle py-0">{{ $product->common_name }}</td>
                  <td class="align-middle py-0">{{ $product->scientific_name }}</td>
                  <td class="align-middle py-0 text-right">{{ number_format($product->cost,0,',','.') }}</td>
                  <td class="align-middle py-0 text-center">{{ $product->stock }}</td>
                  <td class="align-middle text-center py-0">
                     <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a type="button" href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark m-1 text-white" name="btnView" id="btnView" value="{{ $product->id}}" data-toggle="tooltip" data-placement="bottom" title="Ver"><i class="far fa-eye"></i></a>
                        <a type="button" href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-blue m-1 text-white" name="btnEdit" id="btnEdit" value="{{ $product->id}}" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                        <a type="button" href="{{ route('products.inout', $product->id) }}" class="btn btn-sm btn-warning m-1" name="btnTransaction" id="btnTransaction" value="{{ $product->id}}" data-toggle="tooltip" data-placement="bottom" title="Entrada / Salida"><i class="fas fa-exchange-alt"></i></a>
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger m-1 text-white" name="btnDelete" value="{{ $product->id}}" data-toggle="tooltip" data-placement="bottom" title="Borrar"><i class="far fa-trash-alt"></i></button>
                     </form>

                  </td>
               </tr>
               @empty
               <p>No hay empleados para mostrar</p>
               @endforelse
            </tbody>
         </table>
      </div>
   </div>
   <!-- Enlaces de paginación -->
   <!-- div class="row m-auto justify-content-center">
      {{-- $products->links() --}}
   </div -->
</div>
@endsection

@push('dt')
<script>  // https://eldesvandejose.com/2016/12/05/el-plugin-datatables-iv-mejorando-el-aspecto/
   $(document).ready( function () {
       $('#infTable').DataTable({
           "order": [[ 1, "asc" ]],
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
@endpush
