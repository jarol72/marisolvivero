@extends('layouts.admin')

@section('content')

   <div class="container">

            <div class="content">
               <div id="divTable" class="table-responsive">
                  <table id="infTable" class="display table table-hover table-striped responsive nowrap">
                     <thead>
                        <tr class="bg-btn-lightgreen text-white">
                           <!-- th>Id</th -->
                           <th>Id</th>
                           <th>Nombre Común</th>
                           <th>Nombre Científico</th>
                           <th>Vlr. unitario</th>
                           <th>Disponible</th>
                           <th>Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($products as $product)
                           <tr class="align-middle p-0">
                              <td class="align-middle p-0">{{ $product->id }}</td>
                              <td class="align-middle p-0">{{ $product->common_name }}</td>
                              <td class="align-middle p-0">{{ $product->scientific_name }}</td>
                              <td class="align-middle p-0 text-center">{{ $product->cost }}</td>
                              <td class="align-middle p-0 text-center">{{ $product->stock }}</td>
                              <td class="align-middle p-0">
                                 <form method="POST" class="float-left" id="btnEditReg">
                                    <button type="button" class="btn btn-sm btn-blue m-1" name="btnEditar" id="btnEditar" value="{{ $product->id}}">Editar</button>
                                 </form>
                                 <form method="POST" class="float-left" id="btnDeleteReg">
                                    <button type="button" class="btn btn-sm btn-danger m-1" name="btnBorrar" id="btnBorrar" value="{{ $product->id}}">Borrar</button>
                                 </form>
                              </td>
                           </tr>
                        @empty
                           <p>No hay productos para mostrar</p>
                        @endforelse
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- Enlaces de paginación -->
            <div class="row m-auto justify-content-center">
               {{$products->links()}}
            </div>

   </div>

@endsection
