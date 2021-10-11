@extends('layouts.app')
@section('content')
  <div class="container">
    <form action="{{ url('/empleado/'.Auth::user()->id) }}" method="post">
      @csrf
      {{ method_field('PATCH') }}
      {{-- Incluimos el formulario del otro archivo, le indicamos la ruta a include --}}
      {{-- modo para diferenciar los forms --}}
      @include('empleado.form', ['modo'=>'Editar'])
    </form>
  </div>
@endsection
