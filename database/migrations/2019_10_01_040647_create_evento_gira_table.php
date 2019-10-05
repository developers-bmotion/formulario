<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoGiraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_gira', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('eventos_id');
            $table->unsignedBigInteger('giras_id');
            
            $table->foreign('eventos_id')->references('id')->on('eventos');
            $table->foreign('giras_id')->references('id')->on('giras');

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
        Schema::dropIfExists('evento_gira');
    }
}
