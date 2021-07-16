
<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<div class="container">
        <div class="row justify-content-md-center">
            <div class="col-4">
                <a>
                    <p> <strong>Pymes regionales</strong></p>
                </a>
            </div>
            <div class="col-5"></div>
            <div class="col-3">

                @if (Route::has('login'))

                @auth
                <a href="{{ url('/perfil') }}" class="text-sm text-gray-700 underline">Perfil</a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Iniciar Sesión</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registrarse</a>
                @endif
                @endauth

                @endif

            </div>
        </div>

    </div>
    <hr>
    <div>
    <div class="container">

        <div class="container">

            <div class="col-md-12">

                <div class="card">
                <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i></a>

                <h3 style="text-align:center" >{{$pyme->name}}</h3>
                <br>
                <img src="{{$pyme->imagen_perfil}}" height=450px style="border-radius:20px;">

                    <div class="card-header">Bienvenido(a)</div>
                    <div class="card-header">
                    <p style="float:left"><i class="fab fa-facebook-square"></i>{{$pyme->facebook}}</p> 
                    <p style="float:right"> <i class="fab fa-instagram-square"></i>{{$pyme->instagram}} </p>
                    </div>

                    <div class="card-header">Catologo de productos </div>
                    <div class="card-header" justify-content-center>
 
                        <div class="row">
                            @foreach($productos as $producto)
                                @if($producto->estado == '1')
                                <div class="col-md-4 text-md-center">
                                <br>
                                <img style="width: 150px; height: 100px" src="/{{$producto->imagen}}" class="img-top" alt="{{$producto->imagen}}">

                                    <h5>{{$producto->nombre}}</h5>
                                    <p>Precio: ${{$producto->precio}}</p> 

                                    <p>{{$producto->created_at}}</p>       

                                    <a class="btn btn-primary" href="{{action('App\Http\Controllers\DetalleProductoController@show',$producto->id)}}">Detalles</a>

                                </div>
                                @endif

                            @endforeach


                        </div>

                    </div>

                    <div class="card-footer justify-content-center">

                    </div>

                </div>

            </div>

        </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</html>

