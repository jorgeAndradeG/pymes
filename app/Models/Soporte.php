<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soporte extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    public $timestamps = true;
	protected $table = 'soporte';	
	protected $fillable = ['problema','estado','id_admin','id_usuario','estado'];

}
