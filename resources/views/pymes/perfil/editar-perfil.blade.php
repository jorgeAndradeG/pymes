@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="container">
        <div class="row align-items-start">
            <div class="col-12">
                <!-- Botón para activar la función JavaScript de al final y poder editar los datos de perfil.-->
                <h3 style="text-align:center;">Datos de Perfil  <button type="button" class="btn btn-success btn-sm" onclick=editarPerfil()><i class="far fa-edit"></i></button></h3>
                <br>

                <!-- ACÁ LLAMAMOS AL MÉTODO UPDATE QUE SIRVE PARA ACTUALIZAR LOS DATOS DEL PERFIL, Y LE PASAMOS LA ID DEL USUARIO -->
                <form method="POST" action="{{action('App\Http\Controllers\PerfilController@update',$usuario->id)}}" enctype="multipart/form-data"> 
                    @csrf <!--PARA SEGURIDAD-->
                    @method('PATCH') <!-- ESTO SE COLOCA PARA QUE PUEDA INGRESAR LOS DATOS A LA BD, YA QUE NO ESTÁ DEFINIDO COMO POST EN EL WEB -->
                    @if(isset($msg))
                        {{$msg}}
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
                        <input type="text" class="form-control" name="text" id="instagram" value="{{$usuario->instagram}}" disabled>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{$usuario->facebook}}" disabled>
                    </div>

                    <hr>
                    <div class="form-floating mb-3">
                        <label for="imagen">Imagen de Perfil</label>

                        @if(isset($usuario->imagen_perfil)) <!-- SI TIENE FOTO DE PERFIL LA MUESTRA-->
                            <img src="{{$usuario->imagen_perfil}}" class="img-thumbnail" alt="..." width="200" height="100">
                        @else <!-- SI NO TIENE FOTO DE PERFIL LE INFORMA -->
                            <p style="text-align:center; color:red;">Sin Imagen de Perfil... Aún!</p>
                        @endif
                        <input type="file" class="form-control" id="imagen" name="file" disabled>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success" id="botonEditar" disabled>Cambiar Datos</button>
                </form>
                
            </div>

        </div>
    </div>
@stop
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