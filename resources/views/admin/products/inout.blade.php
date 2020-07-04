@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="card">
                <div class="card-header bg-btn-green text-white">
                    <h5 class='m-0'>@lang('In / Out') @lang('Product')</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @include('partials._session-status')
                    <div class="">
                        <div class="">
                            <form method="GET" action="{{ route('products.transaction', $product->id) }}" class="mb-0" enctype="multipart/form-data">
                                @csrf 
                                <input type="hidden" name="id" class="form-control w-100" id="id" value="{{ old('id',$product->id) }}">
                                <div class="text-center">
                                    <label for="" class="d-block h3">{{$product->common_name}}</label>
                                    <small class="text-danger font-italic"><p for="" class="d-block">{{$product->scientific_name}}</p></small>
                                </div>
                                <hr>
                                <!-- BOTONES DE OPCIÓN -->
                                <label for="type" class="d-block">@lang('Transaction Type')</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="in" value="entrada">
                                    <label class="form-check-label" for="in">@lang('In')</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="out" value="salida">
                                    <label class="form-check-label" for="out">@lang('Out')</label>
                                </div><!-- FIN DE BOTONES DE OPCIÓN -->

                                <div class="form-inline mt-3">
                                    <label for="quantity" class="col-form-label">{{__('Quantity')}}</label>
                                    <input type="number" name="quantity" class="form-control ml-3 w-75" id="quantity" value="{{ old('quantity') }}">
                                        {!! $errors->first('quantity', '<small>:message</small>') !!}
                                </div>

                                <div class="form-group py-2 mb-3 ">
                                    <label for="reason" class="">{{__('Reason')}}</label>
                                    <textarea name="reason" class="form-control" id="reason" cols="30" rows="3   ">{{ old('reason') }}</textarea>
                                       {!! $errors->first('reason', '<small>:message</small>') !!}
                                 </div>

                                <div class="d-flex">
                                    <button type="submit" class="btn bg-btn-lightgreen text-white mx-0 w-75">@lang('Process')</button>
                                    <a href="{{ route('products.index') }}" class="btn btn-danger ml-2 w-75">@lang('Cancel')</a>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection