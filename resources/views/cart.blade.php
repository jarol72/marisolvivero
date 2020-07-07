@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <a href="{{ route('catalog') }}" class="btn bg-btn-lightgreen text-white">@lang('Add Products')</a>
            @if(!session()->has('orderSent'))
                <button type="button" class="btn bg-btn-lightgreen text-white float-right " data-toggle="collapse" data-target="#deliveryData">@lang('Send Order')
                </button>
            @endif

            <!-- Datos de envío -->
            <div class="collapse card mt-2" id="deliveryData">
                <div class="card-header h4 font-weight-bold">@lang('Send Order')</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cart.store') }}" class="mb-0">
                        <p class="text-secondary mx-0">
                            Por favor escriba su número de identificación
                        </p>
                        @csrf 
                        <div class="form-inline pl-0 mb-0">
                            <label for="nit" class="">@lang('NIT / CC')</label>
                            <input type="text" name="nit" class="form-control mx-2" id="nit" value="{{ old('nit') }}">
                            {!! $errors->first('nit', '<small>:message</small>') !!}
                            <button type="submit" name="sendOrder" class="btn bg-btn-lightgreen text-white my-1">@lang('Confirm')</button>
                            <small class="text-secondary ml-3"><i>Este número será utilizado para identificar su pedido.</i></small>
                        </div>

                    </form>
                </div>
            </div><!-- Datos de envío -->

    <!-- Carro de compras -->
    <div class="card mt-2">
        <div class="card-header h4 bg-darkgreen text-white font-weight-bold">@lang('Cart')</div>

        <div class="card-body">
            @include('partials._session-orderSent')
            @if (count(Cart::content()))
            <div class="content mt-1">
                <div id="divTable" class="table-responsive">
                    @include('partials._session-status')
                    <table id="infTable" class="display table table-hover table-striped responsive nowrap">
                        <thead>
                            <tr class="bg-btn-lightgreen text-white">
                                <th>@lang('Name')</th>
                                <th class="text-center">@lang('Quantity')</th>
                                <th class="text-right">@lang('Cost')</th>
                                <th class="text-right">@lang('Total')</th>
                                <th class="text-center">@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (Cart::content() as $item)
                            <tr class="align-items-center">
                                <td class="align-middle">{{ $item->name }}</td>
                                <td class="text-center align-middle">{{ $item->qty }}</td>
                                <td class="align-middle text-right">$ {{ number_format($item->price,0,',','.') }}</td>
                                <td class="align-middle text-right">$ {{ number_format($item->total,0,',','.') }}</td>
                                <td class="align-middle text-center">
                                    @if(!session()->has('orderSent'))
                                    <form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
                                        <button type="button" class="btn btn-sm btn-blue m-1 text-white" data-toggle="modal" data-target="#itemEdit"><i class="fas fa-pencil-alt"></i></button>
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger m-1 text-white" name="btnDelete" value="{{ $item->rowId}}"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <p>No hay empleados para mostrar</p>
                            @endforelse
                        <tfoot>
                            <tr class="bg-btn-lightgreen text-white text-center">
                                <th colspan="3" class="text-right font-weight-bold">Valor Total</th>
                                <th class="text-right font-weight-bold">$ {{ Cart::total() }}</th>
                                <th class="text-right font-weight-bold"></th>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="alert alert-info text-center m-0" role="alert">
                @lang('Your cart is <b>empty</b>')
            </div>
            @endif
        </div>
    </div>
</div>
</div>
</div><!-- Fin carro de compras -->


<!-- Modal para modificar cantidades de producto -->
<div class="modal fade" id="itemEdit" name="itemEdit" tabindex="2" role="dialog" aria-labelledby="itemEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  bg-btn-lightgreen text-white">
                <h5 class="modal-title font-weight-bold" id="itemEditModalLabel">Modificar Cantidad - @if (count(Cart::content())){{ $item->name }} @endif</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">
                    Escriba la cantidad que desea comprar
                </p>
                <form action="@if (count(Cart::content())) {{ route('cart.edit', $item->rowId) }} @endif" class="d-flex justify-content-between">
                    <div class="form-inline col-6">
                        <label for="quantity" class="col-4">@lang('Quantity')</label>
                        <input type="number" name="quantity" id="quantity" class="form-control col-7 ml-auto" aria-describedby="quantityHelpInline">
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
</div><!-- Modal para modificar cantidades de producto -->



@endsection