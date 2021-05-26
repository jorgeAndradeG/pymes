@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="container-fluid">
    <a href="{{action('App\Http\Controllers\ProductosController@create')}}" type="button" class="btn btn-success ">agregar producto</a>
    <br>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            @foreach($productos as $producto) <!-- RECORREMOS EL "ARREGLO" DE PRODUCTOS QUE ENVIAMOS DESDE EL CONTROLADOR -->
                <tr>
                <th>{{$producto->nombre}}</th>
                <td>{{$producto->stock}}</td>
                <td>{{$producto->precio}}</td>
                <td><a type="button" class="btn btn-success btn-sm" href="{{action('App\Http\Controllers\ProductosController@edit', $producto->id)}}"><i class="far fa-edit"></i></a></td> <!-- BOTÓN PARA EDITAR UN PRODUCTO -->
                <td><a type="button" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a></td> <!-- bOTÓN PARA ELIMINAR UN PRODUCTO -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
