@extends('adminlte::page')

@section('title', 'Dashboard')

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
                        <th scope="col">Dar de Baja</th>

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
                            <p style="color:red">Deshabilitar</p>
                        </td>
                        @endif
                        <td><a type="button" class="btn btn-danger btn-sm" href="{{action('App\Http\Controllers\UsuariosController@edit', $user->id)}}"><i class="fa fa-trash"></i></a></td> <!-- BOTÓN PARA EDITAR UN PRODUCTO -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>

    </div>

</div>
@stop