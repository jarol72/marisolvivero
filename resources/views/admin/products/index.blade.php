@extends('layouts.admin')

@section('content')

<div class="container">
   <h2 class="text-center text-bold">@lang('Products')</h2>
   <div class="d-flex justify-content-between align-items-center mb-1 ml-0">
      {{-- @include('partials._searchForm') --}}
      
      <!-- BOTONES PARA FILTROS POR CATEGORÍA -->
      <div class="d-flex mt-3 mb-2 btn-group-justified p-0">
         <span class="mr-2 text-bold align-self-center">Filtrar: </span>
         <a href="{{route('products.index')}}" class="btn btn-sm btn-cat-filter bg-btn-lightgreen  ml-0 text-white {{(request('id') == null) ? 'active' : ''}}">Todos</a>
         @forelse($categories as $category)
         <a href="{{route('adm_category_filter', $category->id)}}" class="btn btn-sm btn-cat-filter bg-btn-lightgreen ml-1 border-left text-white {{(request('id') == $category->id) ? 'active' : ''}}">{{$category->category}}</a>
         @empty
         Sin datos
         @endforelse
      </div> <!-- FIN BOTONES PARA FILTROS POR CATEGORÍA -->

      <div class="d-flex mt-3 mb-2 btn-group-justified p-0">   
         <!-- Exportar a XLS -->
         <a href="{{ route('products.xls') }}" class="float-right mr-3"><button type="button" class="btn btn-sm float-right p-0" style="color: #217346"><i class="far fa-file-excel fa-2x"></i></button></a>
         
         <!-- Exportar a PDF -->
         <a href="{{ route('products.pdf') }}" class="float-right mr-3"><button type="button" class="btn btn-sm text-danger  float-right p-0"><i class="far fa-file-pdf fa-2x"></i></button></a>
         
         <!-- Botón nuevo usuario -->
         <a href="{{ route('products.create') }}" class="float-right"><button type="button" class="btn btn-sm bg-btn-lightgreen text-white float-right"><i class="fas fa-user-plus"></i> @lang('New product')</button></a>
      </div>   
   </div>   


   
   <div class="content mt-1">
      <div id="divTable" class="table-responsive">
         <table id="infTable" class="display table table-hover table-striped responsive nowrap">
            <thead>
               <tr class="bg-btn-lightgreen text-white">
                  <!-- th>Id</th -->
                  <th class="align-middle py-2">@lang('Category')</th>
                  <th class="align-middle py-2">@lang('Common Name')</th>
                  <th class="align-middle py-2">@lang('Scientfic Name')</th>
                  <th class="align-middle py-2 text-right">@lang('Cost')</th>
                  <th class="align-middle py-2 text-center">@lang('Stock')</th>
                  <th class="align-middle py-2 text-center">@lang('Actions')</th>
               </tr>
            </thead>
            <tbody>
               @forelse ($products as $product)
               <tr class="align-items-center">
                  <!-- td>{{ $product->id }}</td -->
                  <td class="align-middle py-0">{{ $product->category->category }}</td>
                  <td class="align-middle py-0">{{ $product->common_name }}</td>
                  <td class="align-middle py-0">{{ $product->scientific_name }}</td>
                  <td class="align-middle py-0 text-right">{{ number_format($product->cost,0,',','.') }}</td>
                  <td class="align-middle py-0 text-center">{{ $product->stock }}</td>
                  <td class="align-middle text-center py-0">
                     <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a type="button" href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $product->id}}"><i class="far fa-eye"></i></a>
                        <a type="button" href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-blue m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $product->id}}"><i class="fas fa-pencil-alt"></i></a>
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger m-1 text-white" name="btnBorrar" value="{{ $product->id}}"><i class="far fa-trash-alt"></i></button>
                     </form>

                  </td>
               </tr>
               @empty
               <p>No hay empleados para mostrar</p>
               @endforelse
            </tbody>
         </table>
      </div>
   </div>
   <!-- Enlaces de paginación -->
   <!-- div class="row m-auto justify-content-center">
      {{-- $products->links() --}}
   </div -->
</div>
@endsection