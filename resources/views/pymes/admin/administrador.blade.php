<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

<div class="form-floating mb-3" style="text-align:right;">
    <a href="{{action('App\Http\Controllers\AdminController@create')}}" type="button" class="btn btn-success ">Agregar Administrador</a>
</div>
<br>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Estado</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        
            
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user) 
            <tr>
            <th>{{$user->name}}</th>
            <td>{{$user->email}}</td>
            @if($user->estado == 1)
                <td><p style="color:green">Activo</p></td>
            @else
                <td><p style="color:red">Inactivo</p></td>
            @endif
            <td><a type="button" class="btn btn-success btn-sm" href="{{action('App\Http\Controllers\AdminController@edit', $user->id)}}"><i class="far fa-edit"></i></a></td> 
            <td><a type="button" class="btn btn-danger btn-sm ventana"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-id='{{$user->id}}'><i class="far fa-trash-alt"></i></a></td> 
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@stop
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">deshabilitar administrador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form  method="POST" action="{{action('App\Http\Controllers\AdminController@eliminar')}}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                            <p>¿Esta seguro que desea deshabilitar este administrador? </p>
                            <input type="hidden" name="modalid" id="modalid">
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">deshabilitar</button>
                        </div>
                </form>
               
                    
                </div>
            </div>
</div>

<script>
$(document).on("click",".ventana",function(){
    var Id = $(this).data('id');
    $(".modal-body #modalid").val(Id);
    $('#exampleModal').modal('show');
});
</script>