<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->string('nombre');
            $table->integer('precio');
            $table->integer('stock');
            $table->integer('es_oferta');
            $table->integer('precio_oferta')->nullable();
            $table->integer('estado');
            $table->longText('descripcion')->nullable();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
