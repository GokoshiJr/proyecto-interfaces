{{-- como usamos el mismo formulario en create, alli no tenemos ningun dato que mostrar, por lo tanto vamos a validar esa condicion con un isset, isset($empleado->nombre)?$empleado->nombre:"", si existe muestralo sino espacio en blanco --}}

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

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $modo }}</div>
        <div class="card-body">          

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($empleado->name)?$empleado->name:old('name') }}" required autocomplete="name" autofocus>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
            <div class="col-md-6">
              <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ isset($empleado->last_name)?$empleado->last_name:old('last_name') }}" required autocomplete="last_name">
              @error('last_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="id_card" class="col-md-4 col-form-label text-md-right">{{ __('ID Card') }}</label>
            <div class="col-md-6">
              <input id="id_card" type="number" class="form-control @error('id_card') is-invalid @enderror" name="id_card" value="{{ isset($empleado->id_card)?$empleado->id_card:old('id_card') }}" required autocomplete="id_card">
              @error('id_card')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>
            <div class="col-md-6">
              <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ isset($empleado->birth_date)?$empleado->birth_date:old('birth_date') }}" required autocomplete="birth_date">
              @error('birth_date')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          {{-- <div class="form-group row">
            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }} </label>
            <div class="col-md-6">
              <img src="{{ asset('storage').'/'.$empleado->photo }}" class="mb-3" alt="" width="320px" height="200px" style="border: 2px solid black;">
              {{$empleado->photo}}
              <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="" required autocomplete="photo">
              @error('photo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>            
          </div> --}}
          <div class="form-group row">
            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
            
            <div class="col-md-6">
              <img src="{{ asset('storage').'/'.$empleado->photo }}" class="mb-3" alt="" width="320px" height="200px" style="border: 2px solid black;">

                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" autocomplete="photo">

                @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="direction" class="col-md-4 col-form-label text-md-right">{{ __('Direction') }}</label>
            <div class="col-md-6">
              <input id="direction" type="text" class="form-control @error('direction') is-invalid @enderror" name="direction" value="{{ isset($empleado->direction)?$empleado->direction:old('direction')  }}" required autocomplete="direction">
              @error('direction')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
            <div class="col-md-6">
              <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ isset($empleado->state)?$empleado->state:old('state') }}" required autocomplete="state">
              @error('state')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
            <div class="col-md-6">
              <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ isset($empleado->city)?$empleado->city:old('city') }}" required autocomplete="city">
              @error('city')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($empleado->email)?$empleado->email:old('email') }}" required autocomplete="email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
          </div>

          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">                
              <a class="btn btn-success" href="{{ url('empleado/') }}">Regresar</a>
              <input class="btn btn-primary" type="submit" value="{{ $modo }} Datos" id="enviar">
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>