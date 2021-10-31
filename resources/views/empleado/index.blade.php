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
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-4">
          <div class="card" style="width: 21rem;">
            <img src="{{ asset('storage').'/'.$empleado->photo }}" class="card-img-top" alt="">
            <div class="card-body">
              <h4 class="card-title">{{ $empleado->name }} {{ $empleado->last_name }}</h4>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{ $empleado->email }}</li>
              <li class="list-group-item">{{ $empleado->state }} {{ $empleado->city }}</li>
              <li class="list-group-item">{{ $empleado->birth_date }}</li>
              @if ($empleado->is_admin == 0)
                <li class="list-group-item">Range: Employee</li>
              @else
                <li class="list-group-item">Range: Admin</li>
              @endif              
            </ul>            
          </div>
        </div>
      </div>
    </div>  
  </div>
@endsection