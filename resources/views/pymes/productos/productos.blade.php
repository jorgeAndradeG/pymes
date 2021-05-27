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
                    <td><p><s>{{$producto->precio}}</s><br>{{$producto->precio_oferta}}</p></td>
                @else
                    <td>{{$producto->precio}}</td>
                @endif
                @if($producto->estado == 1)
                    <td><p style="color:green">Activo</p></td>
                @else
                    <td><p style="color:red">Inactivo</p></td>
                @endif
                <td><a type="button" class="btn btn-success btn-sm" href="{{action('App\Http\Controllers\ProductosController@edit', $producto->id)}}"><i class="far fa-edit"></i></a></td> <!-- BOTÓN PARA EDITAR UN PRODUCTO -->
                <td><a type="button" class="btn btn-danger btn-sm" href="{{action('App\Http\Controllers\ProductosController@destroy', $producto->id)}}"><i class="far fa-trash-alt"></i></a></td> <!-- bOTÓN PARA ELIMINAR UN PRODUCTO -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
