@extends('layouts.admin')

@section('content')

   <div class="container">
      <h2 class="text-center text-bold">@lang('Registered Clients')</h2>
      <div class="d-flex justify-content-between mb-1 ml-0">
         
      @include('partials._searchForm')
      
      <a href="{{ route('clients.create') }}" class="float-right"><button type="button" class="btn btn-sm bg-btn-lightgreen text-white float-right"><i class="fas fa-user-plus"></i> @lang('New User')</button></a>
   </div>
   <div id="searchResults"></div>
      
            <div class="content mt-3">
               <div id="divTable" class="table-responsive">
                  <table id="infTable" class="display table table-hover table-striped responsive nowrap">
                     <thead>
                        <tr class="bg-btn-lightgreen text-white">
                           <!-- th>Id</th -->
                           <th class="align-middle">Nombre</th>
                           <th class="align-middle">Correo</th>
                           <th class="align-middle">Cliente desde</th>
                           <th class="align-middle text-center">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($clients as $client)
                           <tr class="align-items-center">
                              <!-- td>{{ $client->id }}</td -->
                              <td class="align-middle py-0">{{ $client->name }}</td>
                              <td class="align-middle py-0">{{ $client->email }}</td>
                              <td class="align-middle py-0">{{ $client->created_at->diffForHumans() }}</td>
                              <td class="align-middle text-center py-0">
                              <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                                 <a type="button" href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-dark m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $client->id}}"><i class="far fa-eye"></i></a>
                                 <a type="button" href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-blue m-1 text-white" name="btnEditar" id="btnEditar" value="{{ $client->id}}"><i class="fas fa-pencil-alt"></i></a>
                                 @csrf @method('DELETE')
                                 <button type="submit"class="btn btn-sm btn-danger m-1 text-white" name="btnBorrar" value="{{ $client->id}}"><i class="far fa-trash-alt"></i></button>
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

@endsection