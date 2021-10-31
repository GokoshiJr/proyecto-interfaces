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
      <div class="row">
        <div class="col-12">
          <table class="table table-striped">
            <thead class="thead">
              <tr>                
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Photo 1</th>
                <th scope="col">Photo 2</th>
                <th scope="col">Photo 3</th>
                <th scope="col">Language</th>
                <th scope="col">Library</th>
                <th scope="col">Plugin</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($programas as $programa)
                
                  <tr>
                    <td>{{ $programa->name }}</td>                    
                    <td>{{ $programa->type }}</td>
                    <td>{{ $programa->photo_1 }}</td>
                    <td>{{ $programa->photo_2 }}</td>
                    <td>{{ $programa->photo_3 }}</td>
                    <td>{{ $programa->language }}</td>
                    <td>{{ $programa->library }}</td>
                    <td>{{ $programa->plugin }}</td>
                    
                                      
                    <td>                      
                      
                        <a href="{{ url('/programa/'.$programa->id.'/edit') }}" class="btn btn-primary mb-2"> Editar</a>
                        
                      
                      <form action="{{ url('/programa/'.$programa->id) }}" method="post" class="d-inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger mb-2" type="submit" value="Eliminate" onclick="return confirm('¿Quieres Borrar?')">
                      </form>
                    </td>
                  </tr>
                                
              @endforeach
            </tbody>
          </table>          
          {{-- Paginado --}}
          {!! $programas->links() !!}
        </div>
      </div>       
  </div>
@endsection
