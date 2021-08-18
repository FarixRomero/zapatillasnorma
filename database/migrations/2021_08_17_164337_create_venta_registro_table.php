<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_venta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('zapatillas_id');
            $table->float('precio_venta');
            $table->float('porcantaje_ganancia')->nullable();
            $table->date('fecha_venta')->nullable();
            $table->foreign('zapatillas_id')->references('id')->on('zapatillas');
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
        Schema::dropIfExists('registro_venta');
    }
}
