@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <a href="{{ route('catalog') }}" class="btn bg-btn-lightgreen text-white">@lang('Add Products')</a>
            @if(!session()->has('orderSent') && !Cart::content()->count() == 0)
            <button type="button" class="btn bg-btn-lightgreen text-white float-right " data-toggle="collapse" data-target="#deliveryData">@lang('Send Order')
            </button>
            @endif

            <!-- Datos del cliente -->
            <div class="card mt-2" id="deliveryData">
                <div class="card-header h4 font-weight-bold">@lang('Client Data')</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cart.store') }}" class="mb-0">
                        <p class="text-secondary mx-0">
                            Por favor escriba los datos de quien realiza el pedido
                        </p>
                        @csrf
                        <div class="form-inline">
                            <div class="form-group col col-6 pl-0">
                                <label for="nit" class="col-form-label">@lang('ID')</label>
                                <input type="text" name="nit" class="form-control w-100" id="nit" value="{{ old('nit') }}">
                                {!! $errors->first('nit', '<small>:message</small>') !!}
                            </div>

                            <div class="form-group col col-6 pr-0">
                                <label for="name" class="col-form-label">@lang('Name')</label>
                                <input type="text" name="name" class="form-control w-100" id="name" value="{{ old('name') }}">
                                {!! $errors->first('name', '<small>:message</small>') !!}
                            </div>
                        </div>

                        <div class="form-inline">
                            <div class="form-group col col-6 pl-0">
                                <label for="email" class="col-form-label">@lang('E-Mail Address')</label>
                                <input type="text" name="email" class="form-control w-100" id="email" value="{{ old('email') }}">
                                {!! $errors->first('email', '<small>:message</small>') !!}
                            </div>

                            <div class="form-group col col-6 pr-0">
                                <label for="phone" class="col-form-label">@lang('Phone')</label>
                                <input type="text" name="phone" class="form-control w-100" id="phone" value="{{ old('phone') }}">
                                {!! $errors->first('phone', '<small>:message</small>') !!}
                            </div>
                        </div>

                        <div class="d-block align-content-right mt-3">
                            <button type="submit" name="sendOrder" class="btn bg-btn-lightgreen text-white float-right">@lang('Confirm')</button>
                        </div>
                    </form>
                </div>
            </div><!-- Datos de envío -->

            <hr>

            {{-- Campo de búsqueda --}}
            <div class="container">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Products info </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="text" class="form-controller" id="search" name="search">
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Common Name</th>
                                        <th>Scientific Name</th>
                                        <th>Cost</th>
                                        <th>Stock</th>
                                        <th>Add</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('search')
<script type="text/javascript">
    $('#search').on('keyup', function() {
        $value = $(this).val();
        /* alert($value); */
        $.ajax({
            type: 'get',
            url: 'create/search',
            data: {
                'search': $value
            },
            success: function(data) {
                $('tbody').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
</script>
@endpush