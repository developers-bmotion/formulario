<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporativos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('cliente_final');
            $table->text('objetivo_evento');

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
        Schema::dropIfExists('corporativos');
    }
}
