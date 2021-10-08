{{-- como usamos el mismo formulario en create, alli no tenemos ningun dato que mostrar, por lo tanto vamos a validar esa condicion con un isset, isset($empleado->nombre)?$empleado->nombre:"", si existe muestralo sino espacio en blanco --}}
<h1> {{ $modo }} empleado </h1>

@if (count($errors)>0)
  <div class="alert alert-danger" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
        <li>
          {{ $error }}
        </li>
      @endforeach
    </ul>
  </div>
@endif

<div class="form-group">
  <label for="nombre">Nombre</label>
  <input class="form-control" type="text" name="nombre" value="{{ isset($empleado->nombre)?$empleado->nombre:old('nombre') }}" id="nombre">
</div>

<div class="form-group">
  <label for="apellido">Apellido</label>
  <input class="form-control" type="text" name="apellido" value="{{ isset($empleado->apellido)?$empleado->apellido:old('apellido') }}" id="apellido">
</div>

<div class="form-group">
  <label for="cedula">Cedula</label>
  <input class="form-control" type="number" name="cedula" value="{{ isset($empleado->cedula)?$empleado->cedula:old('cedula') }}" id="cedula">
</div>

<div class="form-group">
  <label for="fecha_nacimiento">Fecha de Nacimiento</label>
  <input class="form-control" type="date" name="fecha_nacimiento" value="{{ isset($empleado->fecha_nacimiento)?$empleado->fecha_nacimiento:old('fecha_nacimiento') }}" id="fecha_nacimiento">
</div>

<div class="form-group">
  <label for="direccion">Direccion</label>
  <input class="form-control" type="text" name="direccion" value="{{ isset($empleado->direccion)?$empleado->direccion:old('direccion') }}" id="direccion">
</div>

<div class="form-group">
  <label for="estado">Estado</label>
  <input class="form-control" type="text" name="estado" value="{{ isset($empleado->estado)?$empleado->estado:old('estado') }}" id="estado">
</div>

<div class="form-group">
  <label for="ciudad">Ciudad</label>
  <input class="form-control" type="text" name="ciudad" value="{{ isset($empleado->ciudad)?$empleado->ciudad:old('ciudad') }}" id="ciudad">
</div>

<div class="form-group">
  <label for="correo">Correo</label>
  <input class="form-control" type="email" name="correo" value="{{ isset($empleado->correo)?$empleado->correo:old('correo') }}" id="correo">
</div>

<div class="form-group">
  <label for="clave">Clave</label>
  <input class="form-control" type="text" name="clave" value="{{ isset($empleado->clave)?$empleado->clave:old('clave') }}" id="clave">
</div>

<a class="btn btn-success" href="{{ url('empleado/') }}">Regresar</a>
<input class="btn btn-primary" type="submit" value="{{ $modo }} Datos" id="enviar">