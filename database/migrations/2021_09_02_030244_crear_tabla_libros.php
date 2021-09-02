<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaLibros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('nombre');
        $table->string('autor');
        $table->date('fecha_publicacion');
        $table->integer('usuario_adquiriente')->nullable()->unsigned();
        $table->foreign('usuario_adquiriente')->references('id')->on('users');
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
        //
    }
}
