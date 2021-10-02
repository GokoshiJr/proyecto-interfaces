Formulario de creacion de empleado

{{-- la informacion del form se envia a storage --}}
<form action="{{ url('/empleado') }}" method="post">
@csrf {{-- laravel nos pide usar una llave de seguridad para saber que el formulario viene desde el mismo sistema --}}
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre">
  <br>
  <label for="apellido">Apellido</label>
  <input type="text" name="apellido" id="">
  <br>
  <label for="Cedula">Cedula</label>
  <input type="number" name="cedula" id="">
  <br>
  <label for="fecha_nacimiento">Fecha de Nacimiento</label>
  <input type="date" name="fecha_nacimiento" id="">
  <br>
  <label for="direccion">Direccion</label>
  <input type="text" name="direccion" id="">
  <br>
  <label for="estado">Estado</label>
  <input type="text" name="estado" id="">
  <br>
  <label for="ciudad">Ciudad</label>
  <input type="text" name="ciudad" id="">
  <br>
  <label for="correo">Correo</label>
  <input type="email" name="correo" id="">
  <br>
  <label for="clave">Clave</label>
  <input type="text" name="clave" id="">
  <br>
  <input type="submit" value="Guardar Datos" id="enviar">
</form>