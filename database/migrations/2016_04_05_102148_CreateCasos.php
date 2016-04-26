<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fec_caso');
            $table->string('titulo');
            $table->integer('id_tipsopor')->unsigned();
            $table->integer('id_areasopor')->unsigned();
            $table->string('descripcion');
            $table->char('estado',1);
            $table->integer('usureg')->unsigned();
            $table->integer('usuasig')->unsigned();
            $table->integer('usucierra')->unsigned();
            $table->foreign('id_tipsopor')->references('id')->on('sopor_tipo')->onDelete('cascade');
            $table->foreign('id_aerasopor')->references('id')->on('areas_sopor')->onDelete('cascade');
            $table->foreign('usureg')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuasig')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usucierra')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('casos');
    }
}
