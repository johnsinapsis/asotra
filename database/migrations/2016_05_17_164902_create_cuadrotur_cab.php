<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuadroturCab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nmcuadroturno_cab', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idturno')->unsigned();
            $table->integer('ano');
            $table->integer('mes');
            $table->char('estado',1);
            $table->integer('usuela')->unsigned();
            $table->integer('usurevi')->unsigned();
            $table->integer('usuapru')->unsigned();
            $table->dateTime('fecela');
            $table->dateTime('fecrevi');
            $table->dateTime('fecapru');
            $table->timestamps();
            $table->foreign('usuela')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usurevi')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuapru')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nmcuadroturno_cab');
    }
}
