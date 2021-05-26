<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); //OBTENEMOS AL USUARIO QUE ESTÁ LOGGEADO.
        $productos = Producto::Where('id_usuario',$user->id)->get(); //BUSCAMOS EN LA TABLA PRODUCTO A TODOS LOS PRODUCTOS QUE TENGA LA ID DEL USUARIO
        return view('pymes.productos.productos',compact('productos')); //RETORNAMOS LA VISTA PRODUCTOS Y EN EL COMPACT LE PASAMOS UNA COLECCIÓN DE PRODUCTOS (ES COMO UN ARREGLO)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       return view('pymes.productos.create-producto');
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
        $user = auth::user();
        if($request['estado'] == 'on' ){
            $estado = 1; 
        }else{
            $estado = 0;
        }
        Producto::create([
            "nombre" => $request['nombre'],       
            "precio" => $request['precio'],
            "stock" =>$request['stock'],
            "id_usuario" => $user->id,
            "es_oferta" => $request['es_oferta'],
            "precio_oferta" =>$request['precio_oferta'],
            "estado" => $estado,
            "descripcion" => $request['descripcion'],           
            ]);
            return redirect("/productos");
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
        $producto = Producto::findOrFail($id);
        return view("pymes.productos.edit-productos")->with(["producto" => $producto]);
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
