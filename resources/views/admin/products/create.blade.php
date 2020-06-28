@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 m-auto">
            <div class="card">
                <div class="card-header bg-btn-green text-white">
                  <h5 class='m-0'>@lang('New Product')</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}" class="mb-0">
                        @csrf
                        <div class="form-group">
                            <label for="name">@lang('Name')</label>
                            <input type="text" class="form-control" name="name" aria-describedby="name">
                        </div>
                        <div class="form-group">
                            <label for="email">@lang('E-Mail Address')</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">@lang("We'll never share your email with anyone else.")</small>
                        </div>
                        <div class="form-group">
                            <label for="password">@lang('Password')</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div>
                            <button type="submit" class="btn bg-btn-lightgreen text-white">@lang('Create User')</button>
                            <button type="reset" class="btn btn-blue">@lang('Reset Fields')</button>
                            <button type="button" class="btn btn-danger" onclick="window.history.go(-1); return false;">@lang('Cancel')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection