<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); //OBTENEMOS AL USUARIO QUE ESTÁ LOGGEADO.
        return view('pymes.perfil.editar-perfil')->with(['usuario' => $user]); //RETORNAMOS LA VISTA Y LUEGO LE ENVIAMOS AL USUARIO LOGGEADO PARA PODER MOSTRAR SUS DATOS EN LA VISTA.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id); //BUSCAMOS AL USUARIO EN LA BD CON SU ID
        //RESCATAMOS LOS DATOS DEL FORMULARIO Y LOS ASIGNAMOS EN LOS CAMPOS CORRESPONDIENTES
        $usuario->name = $request['name']; 
        $usuario->direccion = $request['direccion'];
        $usuario->telefono = $request['telefono'];
        $usuario->facebook = $request['facebook'];
        $usuario->instagram = $request['instagram'];



        //PARA SUBIR LAS IMÁGENES
        
        $file = $request['file'];//RESCATAMOS LA IMAGEN DEL FORMULARIO
        $nombre = $file->getClientOriginalName();
        $formato = explode(".",$nombre);
        $formato = end($formato);

        if (strtolower($formato) != "jpg" && strtolower($formato) != "jpeg" && strtolower($formato) != "png" )
        {
            //CUANDO NO ES IMAGEN
            $user = Auth::user(); //OBTENEMOS AL USUARIO QUE ESTÁ LOGGEADO.
            return view('pymes.perfil.editar-perfil')->with(['usuario' => $user, 'msg' => $file]); //RETORNAMOS LA VISTA Y EL MENSAJE DE ERROR
        } else if(strtolower($formato) == "jpg" || strtolower($formato) == "jpeg" || strtolower($formato) == "png") //CUANDO SI ES UNA IMAGEN
        {
        
            $fecha = getdate();
            $fechaimg = strval($fecha["year"]) . strval($fecha["mon"]) . strval($fecha["mday"]) . strval($fecha["hours"]) . strval($fecha["minutes"]) . strval($fecha["seconds"]) . "_";

            Image::make($file)->resize(600,400)->save('img/' . $fechaimg . $nombre);
        };

        $usuario->imagen_perfil = '/img/' . $fechaimg . $nombre;


        //GUARDAMOS LOS DATOS DE CADA USUARIO
        $usuario->save();

        return redirect('/perfil');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
