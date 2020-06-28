@extends('layouts.admin')

@section('title', 'Productos')

@section('content')
<table>
   <thead>
      <th>{{ @lang('CATEGORÍA') }}</th>
      <th>{{ @lang('NOMBRE COMÚN') }}</th>
      <th>{{ @lang('NOMBRE CIENTÍFICO') }}</th>
      <th>{{ @lang('COSTO') }}</th>
      <th>{{ @lang('CANTIDAD') }}</th>
      <th>{{ @lang('USO') }}</th>
   </thead>
   <tbody>
      <tr>
         <td>{{ $product->category }}</td>
         <td>{{ $product->common_name }}</td>
         <td>{{ $product->scientific_name }}</td>
         <td>{{ $product->cost }}</td>
         <td>{{ $product->stock }}</td>
         <td>{{ $product->use }}</td>
      </tr>
   </tbody>
</table>
@endsection