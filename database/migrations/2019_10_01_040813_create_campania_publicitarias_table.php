<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaniaPublicitariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campania_publicitarias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('agencia');
            $table->string('marca');
            $table->text('objetivo');

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
        Schema::dropIfExists('campania_publicitarias');
    }
}
