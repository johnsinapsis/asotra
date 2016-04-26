<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchicasos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archicasos', function (Blueprint $table) {
            $table->increments('idfile');
            $table->integer('idcaso')->unsigned();
            $table->string('nombre',20);
            $table->string('rutafile',100);
            $table->integer('usureg')->unsigned();
            $table->foreign('idcaso')->references('id')->on('casos')->onDelete('cascade');
            $table->foreign('usureg')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('archicasos');
    }
}
