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
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{$producto->nombre}}"required >
                    </div>

                    <div class="form-floating mb-3">
                        <label for="nombre">Descripción</label>
                        <textarea type="text" class="form-control" name="descripcion" id="descripcion" required >{!! $producto->descripcion !!}</textarea>
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
                            <img src="/{{$imagen->url_imagen}}" class="img-thumbnail" alt="..." width="200" height="100">

                        <input type="file" class="form-control" name="file" id="imagen">
                    </div>

                    @if($producto->es_oferta == 1)
                        <div class="form-check" onclick="eraOferta()">
                            <input class="form-check-input" type="checkbox" id="es_oferta" name="es_oferta" checked>
                            <label class="form-check-label" for="es_oferta">¿Es oferta?</label>
                        </div>
                        <br>

                        <div class="form-floating mb-3" id="precioO" style="display:block">
                            <label for="precio_oferta">Precio oferta</label>
                            <input type="number" class="form-control" name="precio_oferta" id="precio_oferta" value="{{$producto->precio_oferta}}" >
                        </div>
                    @else
                        <div class="form-check" onclick="oferta()">
                            <input class="form-check-input" type="checkbox" id="es_oferta" name="es_oferta">
                            <label class="form-check-label" for="es_oferta">¿Es oferta?</label>
                        </div>
                        <br>

                        <div class="form-floating mb-3" id="precioO" style="display:none">
                            <label for="precio_oferta">Precio oferta</label>
                            <input type="number" class="form-control" name="precio_oferta" id="precio_oferta">
                        </div>
                    @endif
                    
                    
                    <div class="form-check">
                        @if($producto->estado == 1)
                            <input class="form-check-input" type="checkbox" name="estado" id="estado" checked>
                        @else
                            <input class="form-check-input" type="checkbox" name="estado" id="estado">
                        @endif
                        <label class="form-check-label" for="estado">¿Publicar?</label>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-success" id="botonAgregar">Editar Producto</button>
                    </form>
             </div>
            
            
         </div>
</div>


@stop

<script>
function oferta(){

if(document.getElementById("es_oferta").checked == true){

    document.getElementById("precioO").style.display = "block";

}else if(document.getElementById("es_oferta").checked == false){
    
    document.getElementById("precioO").style.display = "none";
    document.getElementById("precio_oferta").value = null;
    
}
} 
function eraOferta(){

if(document.getElementById("es_oferta").checked == true){

    document.getElementById("precioO").style.display = "block";

}else if(document.getElementById("es_oferta").checked == false){
    
    document.getElementById("precioO").style.display = "none";

    
}
} 
</script>
