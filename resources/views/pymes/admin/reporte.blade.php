@extends('adminlte::page')

@section('title', 'Reporte')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 style="text-align:center;">Usuarios registrados durante el último Año</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
        <br>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha Registro</th>            
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user) 
                <tr>
                <th>{{$user->name}}</th>
                @if($user->estado == 1)
                    <td><p style="color:green">Activo</p></td>
                @else
                    <td><p style="color:red">Inactivo</p></td>
                @endif
                <td>@php echo date('d-m-Y',strtotime($user->created_at)); @endphp</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@stop