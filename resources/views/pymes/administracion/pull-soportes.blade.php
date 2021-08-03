<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <div class="form-floating mb-3" style="text-align:right;">
        <h3 style="text-align:center;">Consulta Soporte Técnico</h3>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre Usuario</th>
                <th scope="col">Correo Usuario</th>
                <th scope="col">Estado</th>
                <th scope="col">Ver Problema</th>

            </tr>
        </thead>
        <tbody>
            @foreach($soportes as $soporte)
            @foreach($users as $user)
            @if($user->id == $soporte->id_usuario)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @if($soporte->estado == 1)
                <td>
                    <p style="color:green">Activo</p>
                </td>
                @else
                <td>
                    <p style="color:red">Inactivo</p>
                </td>
                @endif
                <td><a type="button" class="btn btn-success btn-sm" href="{{action('App\Http\Controllers\AdminSoporteController@edit', $soporte->id)}}"><i class="far fa-edit"></i></a></td> <!-- BOTÓN PARA EDITAR UN PRODUCTO -->
            </tr>
            @break
            @endif
            @endforeach
            @endforeach
        </tbody>
    </table>
</div>

@stop