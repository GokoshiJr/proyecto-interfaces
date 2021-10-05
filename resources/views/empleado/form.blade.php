{{-- como usamos el mismo formulario en create, alli no tenemos ningun dato que mostrar, por lo tanto vamos a validar esa condicion con un isset, isset($empleado->nombre)?$empleado->nombre:"", si existe muestralo sino espacio en blanco --}}
<label for="nombre">Nombre</label>
<input type="text" name="nombre" value="{{ isset($empleado->nombre)?$empleado->nombre:'' }}" id="nombre">
<br>
<label for="apellido">Apellido</label>
<input type="text" name="apellido" value="{{ isset($empleado->apellido)?$empleado->apellido:'' }}" id="apellido">
<br>
<label for="cedula">Cedula</label>
<input type="number" name="cedula" value="{{ isset($empleado->cedula)?$empleado->cedula:'' }}" id="cedula">
<br>
<label for="fecha_nacimiento">Fecha de Nacimiento</label>
<input type="date" name="fecha_nacimiento" value="{{ isset($empleado->fecha_nacimiento)?$empleado->fecha_nacimiento:'' }}" id="fecha_nacimiento">
<br>
<label for="direccion">Direccion</label>
<input type="text" name="direccion" value="{{ isset($empleado->direccion)?$empleado->direccion:'' }}" id="direccion">
<br>
<label for="estado">Estado</label>
<input type="text" name="estado" value="{{ isset($empleado->estado)?$empleado->estado:'' }}" id="estado">
<br>
<label for="ciudad">Ciudad</label>
<input type="text" name="ciudad" value="{{ isset($empleado->ciudad)?$empleado->ciudad:'' }}" id="ciudad">
<br>
<label for="correo">Correo</label>
<input type="email" name="correo" value="{{ isset($empleado->correo)?$empleado->correo:'' }}" id="correo">
<br>
<label for="clave">Clave</label>
<input type="text" name="clave" value="{{ isset($empleado->clave)?$empleado->clave:'' }}" id="clave">
<br>
<a href="{{ url('empleado/') }}">Regresar</a>
<input type="submit" value="Guardar Datos" id="enviar">