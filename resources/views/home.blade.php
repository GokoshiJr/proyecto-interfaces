@extends('layouts.master')

@section('content')

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

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="app">
                <registro-component-1 
                    :_id='{{json_encode(Auth::user()->id)}}'
                    :_name='{{json_encode(Auth::user()->name)}}'
                    :_last_name='{{json_encode(Auth::user()->last_name)}}'
                    :_id_card='{{json_encode(Auth::user()->id_card)}}'
                    :_photo='{{json_encode(Auth::user()->photo)}}'
                    :_direction='{{json_encode(Auth::user()->direction)}}'
                    :_state='{{json_encode(Auth::user()->state)}}'
                    :_city='{{json_encode(Auth::user()->city)}}'
                    :_email='{{json_encode(Auth::user()->email)}}'>
                </registro-component-1>                        
            </div>
        </div>
    </div>
</div> --}}
@endsection
