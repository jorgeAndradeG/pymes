<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\ProductoImagen;
use App\Models\CategoriaProducto;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
        $categorias = Categoria::all();
       return view('pymes.productos.create-producto',compact('categorias'));
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
        'file' => 'required',  

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

         //PARA SUBIR LAS IMÁGENES
         if(isset($request['file'])){
            $file = $request['file'];//RESCATAMOS LA IMAGEN DEL FORMULARIO
            $nombre = $file->getClientOriginalName();
            $formato = explode(".",$nombre);
            $formato = end($formato);

            $categorias = Categoria::all();
            if (strtolower($formato) != "jpg" && strtolower($formato) != "jpeg" && strtolower($formato) != "png" )
            {
                //CUANDO NO ES IMAGEN
                return view('pymes.productos.create-producto',compact('categorias'))->with(['msg' => 'Ingrese una imagen con formato válido (JPG, PNG o JPEG)']); //RETORNAMOS LA VISTA Y EL MENSAJE DE ERROR
            } else if(strtolower($formato) == "jpg" || strtolower($formato) == "jpeg" || strtolower($formato) == "png") //CUANDO SI ES UNA IMAGEN
            {
            
                $fecha = getdate();
                $fechaimg = strval($fecha["year"]) . strval($fecha["mon"]) . strval($fecha["mday"]) . strval($fecha["hours"]) . strval($fecha["minutes"]) . strval($fecha["seconds"]) . "_";

                Image::make($file)->resize(600,400)->save('img/' . $fechaimg . $nombre);
            };
        }
        
        $productoCreado = Producto::create([
            "nombre" => $request->nombre,       
            "precio" => $request->precio,
            "stock" =>$request->stock,
            "id_usuario" => $user->id,
            "es_oferta" => $oferta,
            "precio_oferta" =>$request['precio_oferta'],
            "estado" => $estado,
            "descripcion" => $request->descripcion,           
            ]);

        $imagenCreada = Imagen::create([
            "url_imagen" => 'img/' . $fechaimg . $nombre,
        ]);

        ProductoImagen::create([
            "id_producto" => $productoCreado->id,
            "id_imagen" => $imagenCreada->id,
        ]);

        CategoriaProducto::create([
            "id_categoria" => $request['categoria'],
            "id_producto" => $productoCreado->id,
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
        $categorias = Categoria::all();
        $prodCat = CategoriaProducto::Where('id_producto',$id)->get();
        $categoriaProducto = $prodCat[0]->id_categoria;
        $producto = Producto::findOrFail($id);
        $idProductoImagen = ProductoImagen::Where('id_producto',$producto->id)->get();
        $imagen = Imagen::findOrFail($idProductoImagen[0]->id_imagen);
        return view("pymes.productos.edit-productos", compact('categorias'))->with(["producto" => $producto, "imagen" => $imagen, "categoriaProducto" => $categoriaProducto]);
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

        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|integer|gt:0',
            'stock' => 'required|integer|gt:0',
            'descripcion' => 'string|max:255',  

            ]);

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

        //PARA SUBIR LAS IMÁGENES
        if(isset($request['file'])){
            $file = $request['file'];//RESCATAMOS LA IMAGEN DEL FORMULARIO
            $nombre = $file->getClientOriginalName();
            $formato = explode(".",$nombre);
            $formato = end($formato);

            if (strtolower($formato) != "jpg" && strtolower($formato) != "jpeg" && strtolower($formato) != "png" )
            {
                //CUANDO NO ES IMAGEN
                return view('pymes.productos.create-producto')->with(['msg' => 'Ingrese una imagen con formato válido (JPG, PNG o JPEG)']); //RETORNAMOS LA VISTA Y EL MENSAJE DE ERROR
            } else if(strtolower($formato) == "jpg" || strtolower($formato) == "jpeg" || strtolower($formato) == "png") //CUANDO SI ES UNA IMAGEN
            {
            
                $fecha = getdate();
                $fechaimg = strval($fecha["year"]) . strval($fecha["mon"]) . strval($fecha["mday"]) . strval($fecha["hours"]) . strval($fecha["minutes"]) . strval($fecha["seconds"]) . "_";

                Image::make($file)->resize(600,400)->save('img/' . $fechaimg . $nombre);
                $imagenNueva = Imagen::create([
                    'url_imagen' => 'img/' . $fechaimg . $nombre
                ]);
                $productoImagen = ProductoImagen::Where('id_producto',$id)->get();
                $imagenAntigua = $productoImagen[0]->id_imagen;
                $productoImagen[0]->id_imagen = $imagenNueva->id;
                $productoImagen[0]->save();
                $imagenAntigua = Imagen::destroy($imagenAntigua);
                
            };
        }

        $prodCat = CategoriaProducto::Where('id_producto',$id)->get();
        $prodCat[0]->id_categoria = $request['categoria'];
        $prodCat[0]->save();

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
