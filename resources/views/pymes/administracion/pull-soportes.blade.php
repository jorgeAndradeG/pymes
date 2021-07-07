<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

<div class="form-floating mb-3" style="text-align:right;">

</div>
<br>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Estado</th>
            <th scope="col">Ver Problema</th>
            
            </tr>
        </thead>
        <tbody>
        @foreach($soportes as $soporte) <!-- RECORREMOS EL "ARREGLO" DE PRODUCTOS QUE ENVIAMOS DESDE EL CONTROLADOR -->
            <tr>
            <th>{{$soporte->id_usuario}}</th>
           <!-- <td>{{$soporte->id_admin}}</td> -->
            @if($producto->estado == 1)
                <td><p style="color:green">Activo</p></td>
            @else
                <td><p style="color:red">Inactivo</p></td>
            @endif
            <td><a type="button" class="btn btn-success btn-sm" href="{{action('App\Http\Controllers\AdminSoporteController@edit', $producto->id)}}"><i class="far fa-edit"></i></a></td> <!-- BOTÓN PARA EDITAR UN PRODUCTO -->
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@stop