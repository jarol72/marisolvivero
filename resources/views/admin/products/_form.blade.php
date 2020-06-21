@csrf

<div class="form-group row">
   <label for="category" class="col-sm-4 col-form-label">{{__('Categoría')}}</label>
   <div class="col-sm-8">
      <select name="category" class="form-control" id="category">
         <option selected>Seleccione...</option>
         @foreach($categories as $category)
         <option value="{{ $category->id }}">{{ $category->category }}</option>
         @endforeach
      </select>
      {!! $errors->first('category', '<small>:message</small>') !!}
   </div>
</div>
<div class="form-group row">
   <label for="common_name" class="col-sm-4 col-form-label">{{__('Nombre Común')}}</label>
   <div class="col-sm-8">
      <input type="text" name="common_name" class="form-control" id="common_name" value="{{ old('common_name',$product->common_name) }}">
      {!! $errors->first('common_name', '<small>:message</small>') !!}
   </div>
</div>
<div class="form-group row">
   <label for="scientific_name" class="col-sm-4 col-form-label">{{__('Nombre Científico')}}</label>
   <div class="col-sm-8">
      <input type="text" name="scientific_name" class="form-control" id="scientific_name" value="{{ old('scientific_name', $product->scientific_name) }}">
      {!! $errors->first('scientific_name', '<small>:message</small>') !!}
   </div>
</div>
<div class="form-group row">
   <label for="cost" class="col-sm-4 col-form-label">{{__('Precio unitario')}}</label>
   <div class="col-sm-8">
      <input type="text" name="cost" class="form-control" id="cost" value="{{ old('cost', $product->cost) }}">
      {!! $errors->first('cost', '<small>:message</small>') !!}
   </div>
</div>
<div class="form-group row">
   <label for="stock" class="col-sm-4 col-form-label">{{__('Cantidad')}}</label>
   <div class="col-sm-8">
      <input type="text" name="stock" class="form-control" id="stock" value="{{ old('stock', $product->stock) }}">
      {!! $errors->first('stock', '<small>:message</small>') !!}
   </div>
</div>
<div class="form-group row">
   <label for="use" class="col-sm-4 col-form-label">{{__('Uso')}}</label>
   <div class="col-sm-8">
      <textarea name="use" class="form-control" id="use" cols="30" rows="3    ">{{ old('use', $product->use) }}</textarea>
      {!! $errors->first('use', '<small>:message</small>') !!}
   </div>
</div>
<div class="form-group row">
   <label for="img" class="col-sm-4 col-form-label">{{__('Imagen')}}</label>
   <div class="col-sm-8">
      <div class="custom-file">
         <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
         <label class="custom-file-label" for="inputGroupFile01">{{old('image', $product->image)}}</label>
      </div>
      {!! $errors->first('img', '<small>:message</small>') !!}
   </div>
</div>
<div class="form-group row align-content-end mb-0">

            <div class="mx-auto">
               <button type="submit" class="btn bg-btn-lightgreen text-white">{{$btnText}}</button>
            </div>
            </div>