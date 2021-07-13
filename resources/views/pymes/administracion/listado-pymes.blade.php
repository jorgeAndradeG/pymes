<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')

<div class="container-fluid">

    <div class="row">   
        
        <div class="col-1"></div>
        <div class="col-10">
        <h3 style="text-align:center">Lista de Usuarios</h3>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre Usuario</th>
                        <th scope="col">Correo Usuario</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Habilitar/Deshabilitar</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->estado == 1)
                        <td>
                            <p style="color:green">Habilitado</p>
                        </td>
                        @else
                        <td>
                            <p style="color:red">Deshabilitado</p>
                        </td>
                        @endif
                        @if($user->estado == 1)
                        <td><a type="button" class="btn btn-danger btn-sm ventana"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-id='{{$user->id}}'><i class="far fa-trash-alt"></i></a></td>
                        @else
                        <td><a type="button" class="btn btn-success btn-sm restore"  data-bs-toggle="modal-restore" data-bs-target="#restoreModal" data-id='{{$user->id}}'><i class="fas fa-trash-restore"></i></a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>

    </div>

</div>
@stop

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deshabilitar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form  method="POST" action="{{action('App\Http\Controllers\UsuariosController@deshabilitar')}}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                            <p>¿Esta seguro que desea deshabilitar a este usuario? </p>
                            <input type="hidden" name="modalid" id="modalid">
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Deshabilitar</button>
                        </div>
                </form>
               
                    
                </div>
            </div>
</div>

<div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Habilitar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form  method="POST" action="{{action('App\Http\Controllers\UsuariosController@deshabilitar')}}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                            <p>¿Esta seguro que desea habilitar a este usuario? </p>
                            <input type="hidden" name="modalid" id="modalid">
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Habilitar</button>
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

<script>
$(document).on("click",".restore",function(){
    var Id = $(this).data('id');
    $(".modal-body #modalid").val(Id);
    $('#restoreModal').modal('show');
});
</script>