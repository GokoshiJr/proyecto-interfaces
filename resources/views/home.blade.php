@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id = 'app'>
                <form action="{{ url('/pruebaPost') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Prueba
                        </div>
                        <div class="card-body">
                            <registro-component-1></registro-component-1>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection