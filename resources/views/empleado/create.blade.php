Formulario de creacion de empleado

{{-- la informacion del form se envia a storage --}}
<form action="{{ url('/empleado') }}" method="post">
  {{-- laravel nos pide usar una llave de seguridad para saber que el formulario viene desde el mismo sistema --}}
  @csrf 
  {{-- Incluimos el formulario del otro archivo, le indicamos la ruta a include --}}
  @include('empleado.form');
</form>