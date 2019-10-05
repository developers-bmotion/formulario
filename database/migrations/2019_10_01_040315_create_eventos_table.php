<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('fecha');
            $table->time('hora');
            $table->string('lugar');

            $table->unsignedBigInteger('ciudades_id');
            $table->unsignedBigInteger('aforos_id');
            $table->unsignedBigInteger('tipos_eventos_id');
            $table->unsignedBigInteger('artistas_id');
            $table->unsignedBigInteger('contactos_id');
            $table->unsignedBigInteger('empresas_id')->nullable();

            $table->foreign('ciudades_id')->references('idCiudades')->on('ciudades');
            $table->foreign('aforos_id')->references('id')->on('aforos');
            $table->foreign('tipos_eventos_id')->references('id')->on('tipo_eventos');
            $table->foreign('artistas_id')->references('id')->on('artistas');
            $table->foreign('contactos_id')->references('id')->on('contactos');
            $table->foreign('empresas_id')->references('id')->on('empresas');
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
        Schema::dropIfExists('eventos');
    }
}
