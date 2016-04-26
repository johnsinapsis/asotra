<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('notas', function (Blueprint $table) {
            $table->integer('idcaso')->unsigned()->nullable();
            $table->increments('idnota');
            $table->string('titulo');
            $table->string('detalle');
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
        Schema::drop('notas');
    }
}
