<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 

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

        $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|integer|gt:0',
        'stock' => 'required|integer|gt:0',
        'descripcion' => 'string|max:255',  
        'file' => 'required|image|max:2048',  
        ]);

        $imagenes = $request->file('file')->store('public/imagenes');
        $url = Storage::url(imagenes);
        Producto::create([
            'url' =>$url
        ]);

        $user = auth::user();
        if($request['estado'] == 'on' ){
            $estado = 1; 
        }else{
            $estado = 0;
        }
        if($request['es_oferta'] == 'on' ){
            $oferta = 1; 
        }else{
            $oferta = 0;
        }
        Producto::create([
            "nombre" => $request->nombre,       
            "precio" => $request->precio,
            "stock" =>$request->stock,
            "id_usuario" => $user->id,
            'url' =>$url,
            "es_oferta" => $oferta,
            "precio_oferta" =>$request->precio_oferta,
            "estado" => $estado,
            "descripcion" => $request->descripcion,           
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

      

        if($request['estado'] == 'on' ){
            $estado = 1; 
        }else{
            $estado = 0;
        }
        if($request['es_oferta'] == 'on' ){
            $oferta = 1; 
        }else{
            $oferta = 0;
        }

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request['nombre'];
        $producto->descripcion = $request['descripcion'];
        $producto->precio = $request['precio'];
        $producto->stock = $request['stock'];
        $producto->es_oferta = $oferta;
        $producto->precio_oferta = $request['precio_oferta'];
        $producto->estado = $estado;

        $producto->save();

        return redirect('/productos');
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
    public function eliminar(Request $request){
        $producto = Producto::destroy($request['modalid']);
        return redirect('/productos');

    }
   
}
