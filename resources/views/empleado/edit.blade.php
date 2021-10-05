Formulario de edicion de empleados
<form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
  @csrf
  {{ method_field('PATCH') }}
  {{-- Incluimos el formulario del otro archivo, le indicamos la ruta a include --}}
  @include('empleado.form');
</form>
