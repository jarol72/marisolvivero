@extends('layouts.admin')

@section('content')

   <div class="container">
      <div class="row">
         <div class="card">
            <div class="card-body">
               <div id="divTable" class="table-responsive">
                  <table id="tblClientes" class="display table table-hover table-striped responsive nowrap"">
                     <thead>
                        <tr class=" bg-success text-white">
                           <!-- th>Id</th -->
                           <th>Nombre</th>
                           <th>Correo</th>
                           <th>Cliente desde</th>
                           <th>Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($clients as $client)
                           <tr class="align-items-baseline">
                              <!-- td>{{ $client->id }}</td -->
                              <td>{{ $client->name }}</td>
                              <td>{{ $client->email }}</td>
                              <td>{{ $client->created_at->diffForHumans() }}</td>
                              <td>
                                 <form method="POST" class="float-left" id="btnEditReg">
                                    <button type="button" class="btn btn-sm btn-primary m-1" name="btnEditar" id="btnEditar" value="{{ $client->id}}">Editar</button>
                                 </form>
                                 <form method="POST" class="float-left" id="btnDeleteReg">
                                    <button type="button" class="btn btn-sm btn-danger m-1" name="btnBorrar" id="btnBorrar" value="{{ $client->id}}">Borrar</button>
                                 </form>
                              </td>
                           </tr>
                        @empty
                           <p>No hay clientes para mostrar</p>
                        @endforelse
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- Enlaces de paginación -->
            <div class="row m-auto justify-content-center">
               {{$clients->links()}}
            </div>
         </div>
      </div>
   </div>

@endsection
