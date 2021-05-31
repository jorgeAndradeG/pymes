<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="container">
        <div class="row align-items-start">
            <div class="col-12">
                <!-- Botón para activar la función JavaScript de al final y poder editar los datos de perfil.-->
                <h3 style="text-align:center;">Datos de Perfil  
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="right" title=" Editar Perfil " onclick=editarPerfil()><i class="far fa-edit"></i></button></h3>
                <br>

                <!-- ACÁ LLAMAMOS AL MÉTODO UPDATE QUE SIRVE PARA ACTUALIZAR LOS DATOS DEL PERFIL, Y LE PASAMOS LA ID DEL USUARIO -->
                <form method="POST" action="{{action('App\Http\Controllers\PerfilController@update',$usuario->id)}}" enctype="multipart/form-data"> 

              

                    @csrf <!--PARA SEGURIDAD-->
                    @method('PATCH') <!-- ESTO SE COLOCA PARA QUE PUEDA INGRESAR LOS DATOS A LA BD, YA QUE NO ESTÁ DEFINIDO COMO POST EN EL WEB -->
                    @if(isset($msg))
                        <p style="color:red; text-align:center;">{{$msg}}</p>
                    @endif
                    <div class="form-floating mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="name" id="nombre" value="{{$usuario->name}}" disabled required>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <label for="mail">Mail</label>
                        <input type="text" class="form-control" name="mail" id="mail" value="{{$usuario->email}}" disabled required>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" value="{{$usuario->direccion}}" disabled>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="telefono">Teléfono</label>
                        <div class="row">
                            <div class="col-1">
                                <input type="number" class="form-control" placeholder="+569" disabled>
                            </div>
                            <div class="col-11">
                                <input type="number" class="form-control" name="telefono" id="telefono" value="{{$usuario->telefono}}" disabled>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="form-floating mb-3">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" name="instagram" id="instagram" value="{{$usuario->instagram}}" disabled>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{$usuario->facebook}}" disabled>
                    </div>

                    <hr>
                    <div class="form-floating mb-3">
                        <label for="imagen">Imagen de Perfil</label><br>
                        @if(isset($usuario->imagen_perfil)) <!-- SI TIENE FOTO DE PERFIL LA MUESTRA-->
                            <img src="{{$usuario->imagen_perfil}}" class="img-thumbnail" alt="..." width="200" height="100">
                        @else <!-- SI NO TIENE FOTO DE PERFIL LE INFORMA -->
                            <p style="text-align:center; color:red;">Sin Imagen de Perfil... Aún!</p>
                        @endif
                        <br>
                        <label for="imagen">Cambiar Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="file" disabled>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-6" style="text-align:left">
                    <button type="submit" class="btn btn-success" id="botonEditar" disabled>Actualizar Datos</button>
                    </div>
                    <div class="col-6" style="text-align:right">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Deshabilitar Cuenta
                    </button>

                    </div>
                    </div>
                   

                   
                </form>
                
            </div>

        </div>
    </div>
@stop

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deshabilitar Cuenta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form  method="POST" action="{{action('App\Http\Controllers\PerfilController@deshabilitar')}}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                    <div class="form-floating mb-3">
                            <label for="passDeshabilitar">Para deshabilitar cuenta ingrese su contraseña:</label>
                            <input type="password" class="form-control" name="passDeshabilitar" id="passDeshabilitar">
                    </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Deshabilitar</button>
                        </div>
                </form>
               
                    
                </div>
            </div>
</div>



<script>
    function editarPerfil(){
        if(document.getElementById("nombre").disabled == true){ //SI EL ELEMENTO NO ESTÁ HABILITADO PARA EDITAR SE CAMBIAN TODOS A HABILITADOS
            document.getElementById("nombre").disabled = false;
            document.getElementById("direccion").disabled = false;
            document.getElementById("telefono").disabled = false;
            document.getElementById("instagram").disabled = false;
            document.getElementById("facebook").disabled = false;
            document.getElementById("imagen").disabled = false;
            document.getElementById("botonEditar").disabled = false;

        }
        else{ //LO CONTRARIO A LA FUNCIÓN ANTERIOR, SI ESTÁN HABILITADOS PARA EDITAR SE CAMBIAN A NO HABILITADOS, INCLUYENDO EL BOTÓN DE AL FINAL
            document.getElementById("nombre").disabled = true;
            document.getElementById("direccion").disabled = true;
            document.getElementById("telefono").disabled = true;
            document.getElementById("instagram").disabled = true;
            document.getElementById("facebook").disabled = true;
            document.getElementById("imagen").disabled = true;
            document.getElementById("botonEditar").disabled = true;

        }
    }
    
</script>

<script>
    $(document).ready(function(){
    $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>