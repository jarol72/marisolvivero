@extends('layouts.admin')

@section('content')
<div class="container col-9">
    <h2 class="text-center text-bold">@lang('Orders')</h2>
    @include('partials._session-status')
    <div class="d-flex justify-content-end mb-1 ml-0">
        {{-- @include('partials._searchForm') --}}
        <div>
            <!-- Botón nuevo pedido -->
            {{-- <a href="{{ route('orders.create') }}" class="float-right"><button type="button" class="btn btn-sm bg-btn-lightgreen text-white float-right"><i class="fas fa-user-plus"></i> @lang('New Order')</button></a> --}}

            <!-- Exportar a PDF -->
            <a href="{{ route('orders.pdf') }}" class="float-right mr-3"><button type="button" class="btn btn-sm text-danger float-right p-0" data-toggle="tooltip" data-placement="bottom" title="Exportar a PDF"><i class="far fa-file-pdf fa-2x"></i></button></a>

            <!-- Exportar a XLS -->
            <a href="{{ route('orders.xls') }}" class="float-right mr-3"><button type="button" class="btn btn-sm float-right p-0" style="color: #217346" data-toggle="tooltip" data-placement="bottom" title="Exportar a Excel"><i class="far fa-file-excel fa-2x"></i></button></a>
        </div>
    </div>


    <div class="content mt-3">
        <div id="divTable" class="table-responsive">
            <table id="infTable" class="display table table-hover table-striped responsive nowrap">
                <thead>
                    <tr class="bg-btn-lightgreen text-white">
                        <th class="align-middle py-2 text-center">Id</th>
                        <th>NIT</th>
                        <th class="align-middle py-2 text-center">Fecha</th>
                        <th class="align-middle py-2 text-center">Fecha pedido</th>
                        <th class="align-middle py-2 text-right">Total</th>
                        <th class="align-middle py-2 text-center">Estado</th>
                        <th class="align-middle py-2 text-center">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                    
                    <tr class="align-items-center">
                        <td class="align-middle py-2 text-center">{{ $order->id }}</td>
                        <td class="align-middle py-2">{{ $order->user_id }}</td>
                        <td class="align-middle py-0 display-none">{{ $order->created_at }}</td>
                        <td class="d-flex flex-column align-items-center"><span>{{ $order->created_at }}</span><span><small class="text-secondary float-none">({{ $order->created_at->diffForHumans() }})</small></span></td>
                        <td class="align-middle py-2 text-right">$ {{ number_format($order->total,0,',', '.') }}</td>
                        <td class="align-middle py-2 text-center">
                            {{ $order->status }}
                        </td>
                        <td class="align-middle text-center py-0">
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <a type="button" href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-dark m-1 text-white" name="btnView" id="btnView" value="{{ $order->id}}"><i class="far fa-eye" data-toggle="tooltip" data-placement="bottom" title="Ver detalle"></i></a>
                                
                                <a type="button" href="{{ route('orders.deliver', $order->id) }}" class="btn btn-sm bg-btn-lightgreen m-1 text-white" name="btnCheck" id="btnCheck" value="{{ $order->id }}" data-toggle="tooltip" data-placement="bottom" title="Entregado"><i class="fas fa-check"></i></a>
                                
                                <button type="submit" class="btn btn-sm btn-danger m-1 text-white" name="btnBorrar" value="{{ $order->id}}" data-toggle="tooltip" data-placement="bottom" title="Borrar"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <p>No hay pedidos para mostrar</p>
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
<script>
    // https://eldesvandejose.com/2016/12/05/el-plugin-datatables-iv-mejorando-el-aspecto/
    $(document).ready(function() {
        $('#infTable').DataTable({
            "columnDefs": [{
                "targets": [2],
                "visible": false,
                "searchable": false
            }, ],
            "order": [
                [1, "asc"]
            ],
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla.",
                "info": "Del _START_ al _END_ de _TOTAL_ ",
                "infoEmpty": "Mostrando 0 registros de un total de 0.",
                "infoFiltered": "(filtrados de un total de _MAX_ registros)",
                "infoPostFix": "(actualizados)",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "searchPlaceholder": "Dato para buscar...",
                "zeroRecords": "No se han encontrado coincidencias.",
                "paginate": {
                    "first": "Primera",
                    "last": "Última",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": "Ordenación ascendente",
                    "sortDescending": "Ordenación descendente"
                }
            },
            "lengthMenu": [
                [5, 7, 10, 20, 25, 50, -1],
                [5, 7, 10, 20, 25, 50, "Todos"]
            ],
            "iDisplayLength": 7,
            "bJQueryUI": false,
        });
    });
</script>
@endpush