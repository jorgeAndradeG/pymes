@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <form method="POST" action="{{action('App\Http\Controllers\AdminSoporteController@update',$soporte->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <h3>Problema Número {{$soporte->id}}</h3>
                <br>
                <p>{{$soporte->problema}}</p>

                <button type="submit" class="btn btn-success">Solucionado</button>
            </div>
            <div class="col-4"></div>
        </div>
    </form>
</div>


@stop