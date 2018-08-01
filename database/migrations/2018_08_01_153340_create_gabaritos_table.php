<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGabaritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gabaritos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('simulado_id')->unsigned();
            $table->foreign('simulado_id')->references('id')->on('simulados');
            $table->string('nome');
            $table->date('data_disponivel');
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
        Schema::dropIfExists('gabaritos');
    }
}
