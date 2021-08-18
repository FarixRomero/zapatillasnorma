<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Zapatillas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('zapatillas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nombre')->nullable();
            $table->float('precio_compra')->default(0);
            $table->float('precio_venta')->default(0)->nullable();
            $table->integer('cantidad')->default(0)->nullable();
            $table->string('url_imagen')->default('https://st3.depositphotos.com/2927609/32461/v/600/depositphotos_324611040-stock-illustration-no-image-vector-icon-no.jpg')->nullable();
            $table->string('talla')->nullable();
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
        Schema::dropIfExists('zapatillas');

    }
}
