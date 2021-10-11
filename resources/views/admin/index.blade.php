@extends('layouts.app')

@section('content')
  <div class="container">
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
      
        {{ Session::get('mensaje') }}
      
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="false">&times;</span>
        </button>
      
    </div>
    @endif
    
    <a href="{{ url('empleado/create') }}" class="btn btn-success mb-4">Registrar Empleado</a>
    
      <div class="row">
        <div class="col-12">
          <table class="table table-striped">
            <thead class="thead">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cedula</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Direccion</th>
                <th scope="col">Estado</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Correo</th>
                <th scope="col">Clave</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($empleados as $empleado)
                <tr>
                  <th>{{ $empleado->id }}</th>
                  <td>{{ $empleado->nombre }}</td>
                  <td>{{ $empleado->apellido }}</td>
                  <td>{{ $empleado->cedula }}</td>
                  <td>{{ $empleado->fecha_nacimiento }}</td>
                  <td>{{ $empleado->direccion }}</td>
                  <td>{{ $empleado->estado }}</td>
                  <td>{{ $empleado->ciudad }}</td>
                  <td>{{ $empleado->correo }}</td>
                  <td>{{ $empleado->clave }}</td>
                  <td>
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                      Editar  
                    </a> 
                    <form action="{{ url('/empleado/'.$empleado->id) }}" method="post" class="d-inline">
                      @csrf
                      {{ method_field('DELETE') }}
                      <input class="btn btn-danger" type="submit" value="Borrar" onclick="return confirm('¿Quieres Borrar?')">
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          @foreach ($users as $user)
            {{ $user->name }}
            {{ $user->email }}
          @endforeach
          {{-- Paginado --}}
          {!! $empleados->links() !!}
        </div>
      </div>
       
  </div>
@endsection