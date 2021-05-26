@extends('adminlte::page')

@section ('title','Dashboard')

@section('content')
<div class="container">
        <div class="Row align-items-start">
             <div class = "col-12">
             <h2 style= "text-align:center"> Agregar Producto</h2>
             <form method="POST" action="{{action('App\Http\Controllers\ProductosController@store')}}" enctype="multipart/form-data"> 
                    @csrf  
                    @if(isset($msg))
                        {{$msg}}
                    @endif
                    <div class="form-floating mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required >
                    </div>
                    
                    <div class="form-floating mb-3">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio" required >
                    </div>

                    <div class="form-floating mb-3">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" id="stock" required>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" name="" id="imagen">
                    </div>

                    <div class="form-check" onclick="oferta()">
                        <input class="form-check-input" type="checkbox" value="" id="es_oferta" >
                         <label class="form-check-label" for="es_oferta"  > Es oferta </label>
                    </div>
                    <br>

                    <div class="form-floating mb-3" id="precioO" style="display:none">
                        <label for="precio_oferta">precio oferta</label>
                        <input type="number" class="form-control" name="precio_oferta" id="precio_oferta" >
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="estado" id="estado">
                        <label class="form-check-label" for="estado">¿Publicar?</label>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-success" id="botonAgregar">Agregar producto</button>
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
</script>
