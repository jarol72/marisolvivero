@extends('layouts.app')

@section('content')

   <div class="container">
      <div class="card">
         <div class="card-body">
				<div id="divTable" class="table-responsive">
					<table id="tblEmpleados" class="display table table-hover table-striped responsive nowrap"">
						<thead>
							<tr class="bg-success text-white">
								<!-- th>Id</th -->
								<th>Nombre</th>
								<th>Correo</th>
								<th>Empleado desde</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($employees as $employee)
                        <tr>
                           <!-- td>{{ $employee->id }}</td -->
                           <td>{{ $employee->name }}</td>
                           <td>{{ $employee->email }}</td>
                           <td>{{ $employee->created_at->diffForHumans() }}</td>
                           <td>
                              <form method="POST" class="float-left" id="btnEditReg">
                                 <button type="button" class="btn btn-sm btn-primary mr-1" name="btnEditar" id="btnEditar" value="{{ $employee->id}}">Editar</button>
                              </form>
                              <form method="POST" class="float-left" id="btnDeleteReg">
                                 <button type="button" class="btn btn-sm btn-danger ml-1" name="btnBorrar" id="btnBorrar" value="{{ $employee->id}}">Borrar</button>
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
		</div>
	</div>

@endsection
