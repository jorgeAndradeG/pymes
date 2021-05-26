@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div class="container">
        <div class="Row align-items-start">
             <div class = "col-12">
             <h2 style= "text-align:center"> Editar Producto</h2>
             <form method="POST" action="{{action('App\Http\Controllers\ProductosController@update', $producto->id)}}" enctype="multipart/form-data"> 
                    @csrf 
                    @method('PATCH') 
                    @if(isset($msg))
                        {{$msg}}
                    @endif
                    <div class="form-floating mb-3">
                        <label for="nombre">Nombre</label>s
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{$producto->nombre}}"required >
                    </div>
                    
                    <div class="form-floating mb-3">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio" value ="{{$producto->precio}}"required >
                    </div>

                    <div class="form-floating mb-3">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" id="stock" value="{{$producto->stock}}"required>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" name="imagen" id="imagen">
                    </div>

                    <div class="form-check" onclick="oferta()">
                        <input class="form-check-input" type="checkbox" id="es_oferta" value="{{$producto->es_oferta}}" >
                         <label class="form-check-label" for="es_oferta"  > Es oferta </label>
                    </div>
                    <br>

                    <div class="form-floating mb-3" id="precioO" style="display:none">
                        <label for="precio_oferta">precio oferta</label>
                        <input type="number" class="form-control" name="precio_oferta" id="precio_oferta" value="{{$producto->precio_oferta}}" >
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="estado" value="{{$producto->estado}}">
                        <label class="form-check-label" for="estado">¿Publicar?</label>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-success" id="botonAgregar">editar producto</button>
                    </form>
             </div>
            
            
         </div>
</div>


@stop