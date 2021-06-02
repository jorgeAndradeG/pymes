<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="container-fluid">

    <div class="form-floating mb-3" style="text-align:right;">
        <a href="{{action('App\Http\Controllers\ProductosController@create')}}" type="button" class="btn btn-success ">Agregar Producto</a>
    </div>
    <br>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            @foreach($productos as $producto) <!-- RECORREMOS EL "ARREGLO" DE PRODUCTOS QUE ENVIAMOS DESDE EL CONTROLADOR -->
                <tr>
                <th>{{$producto->nombre}}</th>
                <td>{{$producto->stock}}</td>
                @if($producto->es_oferta == 1)
                    <td><p><s>{{$producto->precio}}</s> {{$producto->precio_oferta}} <span class="badge bg-success">Oferta</span></p></td>
                @else
                    <td>{{$producto->precio}}</td>
                @endif
                @if($producto->estado == 1)
                    <td><p style="color:green">Activo</p></td>
                @else
                    <td><p style="color:red">Inactivo</p></td>
                @endif
                <td><a type="button" class="btn btn-success btn-sm" href="{{action('App\Http\Controllers\ProductosController@edit', $producto->id)}}"><i class="far fa-edit"></i></a></td> <!-- BOTÓN PARA EDITAR UN PRODUCTO -->
                <td><a type="button" class="btn btn-danger btn-sm ventana"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-id='{{$producto->id}}'><i class="far fa-trash-alt"></i></a></td> <!-- bOTÓN PARA ELIMINAR UN PRODUCTO -->
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
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form  method="POST" action="{{action('App\Http\Controllers\ProductosController@eliminar')}}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                            <p>¿Esta seguro que desea eliminar este producto? </p>
                            <input type="hidden" name="modalid" id="modalid">
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Eliminar</button>
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