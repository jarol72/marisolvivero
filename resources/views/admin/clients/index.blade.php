@extends('layouts.admin')

@section('content')

<div class="container">
   <h2 class="text-center text-bold">@lang('Registered Clients')</h2>
   @include('partials._session-status')
   <div class="d-flex justify-content-end mb-1 ml-0">
      {{-- @include('partials._searchForm') --}}
      <div>   
         <!-- Botón nuevo usuario -->
         <a href="{{ route('clients.create') }}" class="float-right"><button type="button" class="btn btn-sm bg-btn-lightgreen text-white float-right"><i class="fas fa-user-plus"></i> @lang('New Client')</button></a>
         
         <!-- Exportar a PDF -->
         <a href="{{ route('clients.pdf') }}" class="float-right mr-3"><button type="button" class="btn btn-sm btn-sm text-danger float-right p-0" data-toggle="tooltip" data-placement="bottom" title="Exportar a PDF"><i class="far fa-file-pdf fa-2x"></i></button></a>
         
         <!-- Exportar a XLS -->
         <a href="{{ route('clients.xls') }}" class="float-right mr-3"><button type="button" class="btn btn-sm btn-sm float-right p-0" style="color: #217346" data-toggle="tooltip" data-placement="bottom" title="Exportar a Excel"><i class="far fa-file-excel fa-2x"></i></button></a>
      </div>   
   </div>   

   
   <div class="content mt-3">
      <div id="divTable" class="table-responsive">
         <table id="infTable" class="display table table-hover table-striped responsive nowrap">
            <thead>
               <tr class="bg-btn-lightgreen text-white">
                  <!-- th>Id</th -->
                  <th class="align-middle py-2">Nombre</th>
                  <th class="align-middle py-2">Correo</th>
                  <th class="align-middle py-2">Registrado</th>
                  <th class="align-middle py-2">Registrado</th>
                  <th class="align-middle py-2 text-center">Acciones</th>
               </tr>
            </thead>
            <tbody>
               @forelse ($clients as $client)
               <tr class="align-items-center">
                  <!-- td>{{ $client->id }}</td -->
                  <td class="align-middle py-0">{{ $client->name }}</td>
                  <td class="align-middle py-0">{{ $client->email }}</td>
                  <td class="align-middle py-0 display-none">{{ $client->created_at }}</small></span></td>
                  <td class="align-middle py-0">{{ $client->created_at->format('Y-M-d') }} <small class="text-secondary float-right">({{ $client->created_at->diffForHumans() }})</small></span></td>
                  <td class="align-middle text-center py-0">
                     <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                        <a type="button" href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-dark m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $client->id}}" data-toggle="tooltip" data-placement="bottom" title="Ver"><i class="far fa-eye"></i></a>
                        <a type="button" href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-blue m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $client->id}}" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                        @csrf @method('DELETE')
                     <button type="submit" class="btn btn-sm btn-danger m-1 text-white" name="btnBorrar" value="{{ $client->id}}" data-toggle="tooltip" data-placement="bottom" title="Borrar" onclick="return confirm('Está seguro de querer eliminar el cliente?')"><i class="far fa-trash-alt"></i></button>
                     </form>

                  </td>
               </tr>
               @empty
               <p>No hay clientes para mostrar</p>
               @endforelse
            </tbody>
         </table>
      </div>
   </div>
   <!-- Enlaces de paginación -->
   <!-- div class="row m-auto justify-content-center">
      {{-- $clients->links() --}}
   </div -->
</div>
@endsection

@push('dt')
<script>  // https://eldesvandejose.com/2016/12/05/el-plugin-datatables-iv-mejorando-el-aspecto/
   $(document).ready( function () {
       $('#infTable').DataTable({
         "columnDefs": [
            {
                "targets": [ 2 ],
                "visible": false,
                "searchable": false
            },
         ],
         "order": [[ 2, "desc" ]],
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
