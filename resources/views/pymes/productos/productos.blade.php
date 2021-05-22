@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="container-fluid">
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
                <td><button type="button" class="btn btn-success btn-sm"><i class="far fa-edit"></i></button></td> <!-- BOTÓN PARA EDITAR UN PRODUCTO -->
                <td><button type="button" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></td> <!-- bOTÓN PARA ELIMINAR UN PRODUCTO -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
