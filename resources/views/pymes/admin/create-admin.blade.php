<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@extends('adminlte::page')

@section ('title','Dashboard')

@section('content')
<div class="container">
        <div class="row align-items-start">
            <div class="col-12">

                <h3 style="text-align:center;">Datos de administrador </h3>
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form method="POST" action="{{action('App\Http\Controllers\AdminController@store')}}" enctype="multipart/form-data"> 

                    @csrf 
                    @if(isset($msg))
                        <p style="color:red; text-align:center;">{{$msg}}</p>
                    @endif
                    <div class="form-floating mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    
                    <div class="form-floating mb-3">
                        <label for="email">Mail</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>

                    <div class="form-floating mb-3">
                        <label for="password">contraseña</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    
                    <div class="form-floating mb-3">
                        <label for="password_confirmation "> confirmar contraseña</label>
                        <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation" >
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="estado" id="estado">
                        <label class="form-check-label" for="estado">¿Habilitar Administrador?</label>
                    </div>

                    <hr>
                    <div class="col-6" style="text-align:left">
                    <button type="submit" class="btn btn-success" id="botonAgregar">Crear Administrador</button>
                    </div>
                              
                </form>
                
            </div>

        </div>

    </div>
    
@stop