@extends('layouts.admin')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-10 m-auto">
         <div class="card">
            <div class="card-header bg-btn-green text-white">
               <h5 class='m-0'>@lang('Edit Product') - {{$product->common_name}}</h5>
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
               <div class="row">
               <div class="col col-6">
               <form method="POST" action="{{ route('products.update', $product->id) }}" class="mb-0" enctype="multipart/form-data">
                  @csrf @method('PATCH')
                  <input type="hidden" name="id" class="form-control w-100" id="id" value="{{ old('id',$product->id) }}">
                  <div class="form-group col col-6 pl-0 mb-0">
                     <label for="category" class="col-form-label">{{__('Categoría')}}</label>
                     
                        <select name="category_id" class="custom-select" id="category_id">
                           <option selected>Seleccione...</option>
                           @foreach($categories as $category)
                           <option value="{{ $category->id }}" {{ setOptionSelected($category->id, $product->category_id) }}>{{ $category->category }}</option>
                           @endforeach
                        </select>
                        {!! $errors->first('category', '<small>:message</small>') !!}
                     
                  </div>

                  <div class="form-inline">
                     <div class="form-group col col-6 pl-0">
                        <label for="common_name" class="col-form-label">{{__('Common Name')}}</label>
                        <input type="text" name="common_name" class="form-control w-100" id="common_name" value="{{ old('common_name',$product->common_name) }}">
                        {!! $errors->first('common_name', '<small>:message</small>') !!}
                     </div>
                     <div class="form-group col col-6 pr-0">
                        <label for="scientific_name" class="col-form-label">{{__('Scientific Name')}}</label>
                        <input type="text" name="scientific_name" class="form-control w-100" id="scientific_name" value="{{ old('scientific_name', $product->scientific_name) }}">
                        {!! $errors->first('scientific_name', '<small>:message</small>') !!}
                     </div>
                  </div>

                  <div class="form-inline">
                     <div class="form-group col col-6 pl-0">
                        <label for="cost" class="col-form-label">{{__('Cost')}}</label>
                        <input type="number" name="cost" class="form-control w-100" id="cost" value="{{ old('cost', $product->cost) }}">
                        {!! $errors->first('cost', '<small>:message</small>') !!}
                     </div>
                     <div class="form-group col col-6 pr-0">
                        <label for="stock" class="col-form-label">{{__('Stock')}}</label>
                        <input type="number" name="stock" class="form-control w-100" id="stock" value="{{ old('stock', $product->stock) }}">
                        {!! $errors->first('stock', '<small>:message</small>') !!}
                     </div>
                  </div>

                  <div class="form-group py-2 mb-0">
                     <label for="use" class="">{{__('Uso')}}</label>
                     <textarea name="use" class="form-control" id="use" cols="30" rows="6    ">{{ old('use', $product->use) }}</textarea>
                        {!! $errors->first('use', '<small>:message</small>') !!}
                  </div>
                  
                  </div>

                  
                  <div class="col col-6">
                  <div class="">
                     <label for="image" class="col-form-label">{{__('Imagen')}}</label>
                     <input type="file" name="image" class="w-100">
                     @error('image')<span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span>@enderror
                  </div>
                  
                  <div class="mt-2">
                     <div class="text-center">
                        <img src="/{{ $product->image}}" class="img-responsive img-rounded border border-gray shadow img-thumbnail" alt="">
                     </div>
                     <div class="form-group px-0">
                        <div class="d-flex justify-content-around mt-4 w-100">
                           <button type="submit" class="btn bg-btn-lightgreen text-white m-2 w-75">@lang('Save')</button>
                           <a href="{{ route('products.index') }}" class="btn btn-danger m-2 w-75">@lang('Cancel')</a>
                        </div>
                     </div>
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