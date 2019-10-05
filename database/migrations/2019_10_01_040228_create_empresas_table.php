<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('sitioWeb');
            $table->string('documento');

            $table->unsignedBigInteger('tipos_companias_id');
            $table->unsignedBigInteger('tipos_documentos_personas_id')->nullable();
            $table->unsignedBigInteger('tipos_documentos_compania_id')->nullable();

            $table->foreign('tipos_companias_id')->references('id')->on('tipo_companias');
            $table->foreign('tipos_documentos_personas_id')->references('id')->on('tipo_documento_personas');
            $table->foreign('tipos_documentos_compania_id')->references('id')->on('tipo_documento_companias');

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
        Schema::dropIfExists('empresas');
    }
}
