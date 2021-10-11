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
    <h2>Perfil de Usuario</h2>
  </div>
@endsection