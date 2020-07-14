@extends('layouts.admin')

@section('content')
{{-- @php dd($order); @endphp --}}
<div class="container">
<div class="d-flex justify-content-end">
    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
        <a type="button" href="{{ route('orders.index') }}" class="btn btn-warning m-1 " name="btnViewAll" id="btnViewAll" value="{{ $order->id }}" ><i class="nav-icon fas fa-cart-arrow-down" data-toggle="tooltip" data-placement="bottom" title="Todos los pedidos"></i></a>
        <a type="button" href="{{ route('orders.edit', $order->id) }}" class="btn bg-btn-lightgreen m-1 text-white" name="btnCheck" id="btnCheck" value="{{ $order->id}}" data-toggle="tooltip" data-placement="bottom" title="Entregado"><i class="fas fa-check"></i></a>
        @csrf @method('DELETE')
        <button type="submit"class="btn btn-danger m-1 text-white" name="btnBorrar" value="{{ $order->id }}" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="far fa-trash-alt"></i></button>
    </form>
  </div>

<div class="card mt-2">
<div class="card-header h4 bg-darkgreen text-white font-weight-bold">@lang('Order'): {{ $order->user_id }}</div>

    <div class="card-body">
        <div class="content mt-1">
            <div id="divTable" class="table-responsive">
                @include('partials._session-status')
                <table id="infTable" class="display table table-hover table-striped responsive nowrap">
                    <thead>
                        <tr class="bg-btn-lightgreen text-white">
                            <th>@lang('Product')</th>
                            <th class="text-center">@lang('Quantity')</th>
                            <th class="text-right">@lang('Cost')</th>
                            <th class="text-right">@lang('Total')</th>
                            {{-- <th class="text-center">@lang('Actions')</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->products as $product)
                        <tr class="align-order_products-center">
                            <td class="align-middle">{{ $product->common_name}}</td>
                            <td class="align-middle text-center">{{ number_format($product->pivot->quantity,0,',','.') }}</td>
                            <td class="align-middle text-right ">$ {{ $product->cost }}</td>
                            <td class="align-middle text-right">$ {{ number_format($product->pivot->quantity * $product->cost,0,',','.') }}</td>
                            {{-- <td class="align-middle text-center">
                                <form action="" method="POST" id="form" data-toggle="modal" data-target="#order_productEdit">
                                <button type="button" name="btnEdit" id="product{{$product->id}}" class="btn btn-sm btn-blue m-1 text-white" onclick="editQty({{$product->id}});" value="{{$product->pivot->quantity}}"><i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="bottom" title="Cambiar cantidad" value="{{ $product->cost }}"></i></button>

                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger m-1 text-white" name="btnDelete" value="{{ $product->id}}"><i class="far fa-trash-alt" data-toggle="tooltip" data-placement="bottom" title="Eliminar"></i></button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach
                        
                        
                    <tfoot>
                        <tr class="bg-btn-lightgreen text-white text-center">
                            <th colspan="3" class="text-right font-weight-bold">Valor Total</th>
                            <th class="text-right font-weight-bold">$ {{ number_format($order->total,0,',', '.') }}</th>
                            {{-- <th class="text-right font-weight-bold"></th> --}}
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
</div>
{{-- 
<!-- Modal para modificar cantidades de producto -->
<div class="modal fade" id="order_productEdit" name="order_productEdit" tabindex="2" role="dialog" aria-labelledby="order_productEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  bg-btn-lightgreen text-white">
                <h5 class="modal-title font-weight-bold" id="order_productEditModalLabel">Modificar Cantidad</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">
                    Escriba la cantidad que desea comprar
                </p>
                <form action="{{ route('orders.update') }}" class="d-flex justify-content-between" method="POST">
                    @csrf @method('patch')
                    <div class="form-inline col-6">
                        <label for="quantity" class="col-4">@lang('Quantity')</label>
                        <input type="number" name="quantity" id="newQty" class="form-control col-7 ml-auto" aria-describedby="quantityHelpInline" min="0">
                        <input type="text" name="orderId" id="orderId" class="form-control col-7 ml-auto" aria-describedby="orderHelpInline" value="{{ $order->id }}">
                    </div>
                    <div class="flex-column col col-6 justify-contents-center">
                        <div class="col mt-3">
                            <button type="submit" class="btn bg-btn-lightgreen text-white w-100 my-1">@lang('Update')</button>
                            <button type="button" class="btn btn-danger  w-100 my-1" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div><!-- Modal para modificar cantidades de producto --> --}}
@endsection