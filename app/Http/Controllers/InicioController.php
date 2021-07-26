<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Imagen;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\ProductoImagen;
use App\Models\CategoriaProducto;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pymes = User::Where('estado',1)->inRandomOrder()->paginate(4);
        $ofertas = Producto::Where('es_oferta',1)->where('estado',1)->inRandomOrder()->paginate(3);
        $categorias = Categoria::all();
        foreach($categorias as $categoria){
            $prodCat = CategoriaProducto::Where('id_categoria',$categoria->id)->inRandomOrder()->paginate(4);
            $productosCategoria = array();
            foreach($prodCat as $producto){
                $productoFinal = Producto::findOrFail($producto->id_producto);

                $imagenesProducto = ProductoImagen::all();
                $imagen = ProductoImagen::Where('id_producto',$productoFinal->id)->get();
                if(isset($imagen[0])){
                    $imagen = Imagen::findOrFail($imagen[0]->id_imagen);
                    $productoFinal->imagen = $imagen->url_imagen;
                }

                array_push($productosCategoria,$productoFinal);
            }
            $categoria->productos = $productosCategoria;
        }
        $imagenesProducto = ProductoImagen::all();
        foreach($ofertas as $producto){
             $imagen = ProductoImagen::Where('id_producto',$producto->id)->get();
             if(isset($imagen[0])){
                 $imagen = Imagen::findOrFail($imagen[0]->id_imagen);
                 $producto->imagen = $imagen->url_imagen;
             }
        }
        return view('welcome',compact('pymes','ofertas','categorias'));
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
