<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\ProductoImagen;
use Illuminate\Foundation\Auth\User;

class VerPymeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $pyme = User::findOrFail($id);
        $productos = Producto::Where('id_usuario',$id,)->get();
        $imagenesProducto = ProductoImagen::all();
       foreach($productos as $producto){
            $imagen = ProductoImagen::Where('id_producto',$producto->id)->get();
            if(isset($imagen[0])){
                $imagen = Imagen::findOrFail($imagen[0]->id_imagen);
                $producto->imagen = $imagen->url_imagen;
                $producto->fecha = date('d-m-Y',strtotime($producto->created_at));
            }
       }
        return view('pymes.cliente.ver-pyme',compact('productos'))->with(['pyme'=>$pyme]);
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
        //
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
