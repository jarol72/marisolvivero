@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 m-auto">
            <div class="card">
                <div class="card-header bg-btn-green text-white">
                  <h5 class='m-0'>@lang('New Employee')</h5>
                </div>
                <div class="card-body">
                    @include('partials._session-status')
                    <form method="POST" action="{{ route('employees.store') }}" class="mb-0">
                        @csrf
                        <input type="hidden" name="role_id" class="form-control w-100" id="id" value="2">
                        <div class="form-group">
                            <label for="nit">@lang('ID')</label>
                            <input type="text" name="nit"  class="form-control @error('nit') is-invalid @enderror" value="{{ old('nit') }}">
                            @error('nit')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="name">@lang('Name')</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') }}">
                            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email">@lang('E-Mail Address')</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="password">@lang('Password')</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div>
                            <button type="submit" class="btn bg-btn-lightgreen text-white">@lang('Create Employee')</button>
                            <button type="reset" class="btn btn-blue">@lang('Reset Fields')</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-danger">@lang('Cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection