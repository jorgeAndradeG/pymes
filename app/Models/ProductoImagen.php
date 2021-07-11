<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoImagen extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    public $timestamps = true;
	protected $table = 'producto_imagen';	
	protected $fillable = ['id_producto','id_imagen'];

}
