<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Solicitud Soporte Tecnico</title>
</head>
<body>
    <div class="container">
        
             <h2 style="text-align:center">Soporte Tecnico</h2>
             <form method="POST" action="{{action('App\Http\Controllers\SoporteController@store')}}" enctype="multipart/form-data">
             @csrf  
                    @if(isset($msg))
                        {{$msg}}
                    @endif
                  <div class="row">
                     <div class="col-12">   
                     <br>
                        <p style="text-align:center;">Ingresa tu problema y te ayudaremos lo más pronto posible.</p>
                         <label for="problema">Problema:</label>  
             
                         <textarea name="problema" id="problema" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                 </div>

                 <br> <br>

                 <div class="row">
                 <div class="col-5"></div>
                     <div class="col-3">
                        <button type="submit" class="btn btn-success" id="botonEnviar">Enviar Solicitud</button>
                     </div>
                     <div class="col-2"></div>           
                </div>
             </form>
     
        
    
    </div>
</body>
</html>

@stop