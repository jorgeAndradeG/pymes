@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <h3>Nombre del Producto</h3>
    <h5>Nombre Pyme</h5>
    <div class="card-deck">
    <div class="card">
    <div class="card-body">
      <br>
      <img class="card-img-top" src="https://cdn2.cocinadelirante.com/sites/default/files/styles/gallerie/public/images/2020/07/papas-fritas-para-freir.jpg" alt="Card image cap">
    </div>
    </div>
    <!--Segunda Imagen --> 
    <div class="card">
    <div class="card-body">
      <br>
      <img class="card-img-top" src="https://cdn2.cocinadelirante.com/sites/default/files/styles/gallerie/public/images/2020/07/papas-fritas-para-freir.jpg" alt="Card image cap">
    </div>
    </div>
    <!--Tercera  Imagen --> 
    <div class="card">
    <div class="card-body">
      <br>
      <img class="card-img-top" src="https://cdn2.cocinadelirante.com/sites/default/files/styles/gallerie/public/images/2020/07/papas-fritas-para-freir.jpg" alt="Card image cap">
    </div>
    </div>
    </div>  
    <br>

    <!--Datos-->  
    
    <div class="card border-success mb-3" style="max-width">
    <div class="card-body text-success">
    <label for="">Precio : </label>
    <input readonly type="number" style="-webkit-appearance: textfield !important;
    margin: 0;" > </input>
    <label for="">Stock: </label>
    <input readonly type="number"style="-webkit-appearance: textfield !important;
    margin: 0";></input>
    </div>
    </div>

    <!--Descripción-->  
    <div class="card border-success mb-3" style="max-width">
    <div class="card-header bg-transparent">Descripción</div>
    <div class="card-body text-success">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    </div>

    <!--Botón-->  
    <div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Pedir Datos de Contacto
    </button>
    <button class="btn btn-primary" type="button">Pedir Datos de Contacto</button>
    </div>
@stop

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Solicitud de Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Nombre : </label>
        <input type="text">
        <br>
        <label for="">Correo : </label>
        <input type="text">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>

<script>

</script>
