@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 m-auto">
            <div class="card">
                <div class="card-header bg-btn-green text-white">
                  <h5 class='m-0'>@lang('Edit Client'): {{$client->name}}</h5>
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
                    <form method="POST" action="{{ route('clients.update', $client->id) }}" class="mb-0">
                        @csrf @method('PATCH')
                        <input type="hidden" name="id" class="form-control w-100" id="id" value="{{ $client->id }}">
                        <input type="hidden" name="role_id" class="form-control w-100" id="role_id" value="3">
                        <div class="form-group">
                            <label for="name">@lang('Name')</label>
                            <input type="text" class="form-control" name="name" aria-describedby="name" value="{{ $client->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">@lang('E-Mail Address')</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="{{ $client->email }}">
                        </div>
                        <div>
                            <button type="submit" class="btn bg-btn-lightgreen text-white">@lang('Save Changes')</button>
                        <a href="{{ route('clients.index') }}" type="button" class="btn btn-danger text-white" >@lang('Cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection