<link rel="stylesheet" href="{{asset('css/app.css')}}">
@if (Session::has('mensaje'))
  {{ Session::get('mensaje') }}
@endif
<a href="{{ url('empleado/create') }}">Registrar Empleado</a>
<div class="container">
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
              <th scope="row">{{ $empleado->id }}</th>
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
                <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}">
                  Editar  
                </a> 
                <form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
                  @csrf
                  {{ method_field('DELETE') }}
                  <input type="submit" value="Borrar" onclick="return confirm('¿Quieres Borrar?')">
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="{{asset('js/app.js')}}"></script>