@extends('layouts.admin')

@section('content')
<div class="container">
   
    <div class="row">
        <div class="col-md-7 m-auto">
            <div class="card">
               <div class="card-header bg-btn-green text-white">
                  <h5 class='m-0'>@lang('New Product')</h5>
               </div>
               <div class="card-body">
                  @include('partials._session-status')
                  
                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                  
                  <form method="POST" action="{{ route('products.store') }}" class="mb-0" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group col col-6 pl-0 mb-0">
                        <label for="category" class="col-form-label">@lang('Category')</label>
                        
                        <select name="category_id" @error('category_id') is-invalid @enderror" class="custom-select" id="category_id">
                           <option selected>@lang('Select')...</option>
                           @foreach($categories as $category)
                           <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category }}</option>
                           @endforeach
                        </select>
                        @error('category_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        
                     </div>
                     
                     <div class="form-inline">
                        <div class="form-group col col-6 pl-0">
                           <label for="common_name" class="col-form-label">{{__('Common Name')}}</label>
                           <input type="text" name="common_name" class="form-control w-100 @error('common_name') is-invalid @enderror" id="common_name" value="{{ old('common_name') }}">
                           @error('common_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="form-group col col-6 pr-0">
                           <label for="scientific_name" class="col-form-label">{{__('Scientific Name')}}</label>
                           <input type="text" name="scientific_name" class="form-control w-100 @error('scientific_name') is-invalid @enderror" id="scientific_name" value="{{ old('scientific_name') }}">
                           @error('scientific_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                     </div>
                     
                     <div class="form-inline">
                        <div class="form-group col col-6 pl-0">
                           <label for="cost" class="col-form-label">{{__('Cost')}}</label>
                           <input type="number" name="cost" class="form-control w-100 @error('cost') is-invalid @enderror" id="cost" value="{{ old('cost') }}">
                           @error('cost')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="form-group col col-6 pr-0">
                           <label for="stock" class="col-form-label">{{__('Stock')}}</label>
                           <input type="number" name="stock" class="form-control w-100 @error('stock') is-invalid @enderror" id="stock" value="{{ old('stock') }}">
                           @error('stock')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                     </div>
                     
                     <div class="form-group py-2 mb-0">
                        <label for="use" class="">{{__('Uso')}}</label>
                        <textarea name="use" class="form-control @error('use') is-invalid @enderror" id="use" cols="30" rows="3    ">{{ old('use') }}</textarea>
                        @error('use')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                     </div>
                     
                     <div class="">
                        <label for="image" class="w-100">{{__('Imagen')}}</label>
                        <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFileLang" lang="es">
                        <label class="custom-file-label" name="image" for="customFileLang">Seleccionar Archivo</label>
                        </div>
                     </div>
                     @error('image')<span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span>@enderror
                     
                     <div class="form-inline mt-2">
                        <div class="col col-6 text-center">
                           <img src="{{ route('products.image', 'default_product.png') }}" class="img-responsive img-rounded" height="113.03" alt="">
                        </div>
                                 <div class="form-group col-6 px-0 px-0">
                                    <div class="d-flex flex-column justify-content-around mt-3 w-100">
                                       <button type="submit" class="btn bg-btn-lightgreen text-white m-2">@lang('Create Product')</button>
                                       <a href="{{ route('products.index') }}" class="btn btn-danger m-2">@lang('Cancel')</a>
                                    </div>
                                 </div>
                     </div>
                     
                  </form>
               </div>
            </div>
         </div>
    </div>
</div>
@endsection