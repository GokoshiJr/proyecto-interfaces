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
                <th scope="col">ID</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">ID Card</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Direction</th>
                <th scope="col">State</th>
                <th scope="col">City</th>
                <th scope="col">Email</th>
                <th scope="col">Access</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                @if ($user->is_admin == 0)
                  <tr>
                    
                    <th>{{ $user->id }}</th>
                    <td>                      
                      <img src="{{ asset('storage').'/'.$user->photo }}" alt="" width="150px" height="100px" style="border: 2px solid black;">
                    </td>
                    <td>{{ $user->name }}</td>
                    
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->id_card }}</td>
                    <td>{{ $user->birth_date }}</td>
                    <td>{{ $user->direction }}</td>
                    <td>{{ $user->state }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->email }}</td>
                    @if ($user->access == 1)
                      <td> True </td>
                    @else
                      <td> False</td>
                    @endif
                                      
                    <td>                      
                      <form action="{{ url('/admin/'.$user->id) }}" method="post" class="d-inline">
                        @csrf
                        {{ method_field('PATCH') }}
                        <input class="btn btn-primary mb-2" type="submit" value="Activate">
                      </form>                    
                      <form action="{{ url('/admin/'.$user->id) }}" method="post" class="d-inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-warning mb-2" type="submit" value="Deactivate" onclick="return confirm('¿Quieres Desactivar?')">
                      </form>

                      <form action="{{ url('/empleado/'.$user->id) }}" method="post" class="d-inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger mb-2" type="submit" value="Eliminate" onclick="return confirm('¿Quieres Borrar?')">
                      </form>
                    </td>

                  </tr>
                @endif                
              @endforeach
            </tbody>
          </table>          
          {{-- Paginado --}}
          {!! $users->links() !!}
        </div>
      </div>       
  </div>
@endsection