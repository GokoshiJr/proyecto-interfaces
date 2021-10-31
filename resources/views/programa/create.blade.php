@extends('layouts.app')
@section('content')
  <div class="container">
    {{-- la informacion del form se envia a storage --}}
    <form action="{{ url('/programa') }}" method="post">
      {{-- laravel nos pide usar una llave de seguridad para saber que el formulario viene desde el mismo sistema --}}
      @csrf 
      {{-- Incluimos el formulario del otro archivo, le indicamos la ruta a include --}}
      {{-- modo para diferenciar los forms --}}
      @include('programa.form', ['modo'=>'Registrar App'])
    </form>
  </div>
@endsection