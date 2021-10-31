@extends('layouts.app')
@section('content')
  <div class="container">
    
    <form action="{{ url('/programa/'.$programa->id) }}" method="post">
      
      {{ method_field('PATCH') }}
      @csrf 
      
      <div class="container">  
        <div class="row justify-content-center">
          <div class="col-md-8">
            @if (Session::has('mensaje'))
              <div class="alert alert-success alert-dismissible" role="alert">      
                  {{ Session::get('mensaje') }}      
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="false">&times;</span>
                  </button>      
              </div>
            @endif
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
            <div class="card">
              <div class="card-header">Editar Programa</div>
              <div class="card-body">          

                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($programa->name)?$programa->name:old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                  <div class="col-md-6">
                    <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ isset($programa->type)?$programa->type:old('type') }}" required autocomplete="type">
                    @error('type')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="photo_1" class="col-md-4 col-form-label text-md-right">{{ __('Photo Principal') }}</label>
                  <div class="col-md-6">
                    <input id="photo_1" type="text" class="form-control @error('photo_1') is-invalid @enderror" name="photo_1" value="{{ isset($programa->photo_1)?$programa->photo_1:old('photo_1') }}" required autocomplete="photo_1">
                    @error('photo_1')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="photo_2" class="col-md-4 col-form-label text-md-right">{{ __('Photo 2') }}</label>
                  <div class="col-md-6">
                    <input id="photo_2" type="text" class="form-control @error('photo_2') is-invalid @enderror" name="photo_2" value="{{ isset($programa->photo_2)?$programa->photo_2:old('photo_2') }}" required autocomplete="photo_2">
                    @error('photo_2')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="photo_3" class="col-md-4 col-form-label text-md-right">{{ __('Photo 3') }}</label>
                  <div class="col-md-6">
                    <input id="photo_3" type="text" class="form-control @error('photo_3') is-invalid @enderror" name="photo_3" value="{{ isset($programa->photo_3)?$programa->photo_3:old('photo_3') }}" required autocomplete="photo_3">
                    @error('photo_3')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                

                <div class="form-group row">
                  <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Language') }}</label>
                  <div class="col-md-6">
                    <input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ isset($programa->language)?$programa->language:old('language') }}" required autocomplete="language">
                    @error('language')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="library" class="col-md-4 col-form-label text-md-right">{{ __('Library') }}</label>
                  <div class="col-md-6">
                    <input id="library" type="text" class="form-control @error('library') is-invalid @enderror" name="library" value="{{ isset($programa->library)?$programa->library:old('library') }}" required autocomplete="library">
                    @error('library')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="plugin" class="col-md-4 col-form-label text-md-right">{{ __('Plugin') }}</label>
                  <div class="col-md-6">
                    <input id="plugin" type="text" class="form-control @error('plugin') is-invalid @enderror" name="plugin" value="{{ isset($programa->plugin)?$programa->plugin:old('plugin') }}" required autocomplete="plugin">
                    @error('plugin')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">                
                    <a class="btn btn-success" href="{{ url('/programa') }}">Regresar</a>
                    <input class="btn btn-primary" type="submit" value="Editar" id="enviar">
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>

    </form>
  </div>
@endsection