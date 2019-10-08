<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaBoleteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_boleterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tiquetera_definida')->nullable();
            $table->string('nombre_responsable');
            $table->string('experiencia_responsable');

            $table->unsignedBigInteger('eventos_id');

            $table->foreign('eventos_id')->references('id')->on('eventos');

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
        Schema::dropIfExists('venta_boleterias');
    }
}
