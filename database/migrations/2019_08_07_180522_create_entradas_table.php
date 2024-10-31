<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('tipo');
            $table->string('nombre');
            $table->string('cc');
            $table->string('telefono');
            $table->string('articulo');
            $table->string('marca');
            $table->string('modelo');
            $table->string('serial');
            $table->string('problema');
            $table->string('notas');
            $table->timestamps();
            $table->bigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
