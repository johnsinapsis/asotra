<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchinotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archinotas', function (Blueprint $table) {
            $table->integer('idnota')->unsigned()->nullable();
            $table->increments('idfile');
            $table->string('nombre',20);
            $table->string('rutafile',100);
            $table->integer('usureg')->unsigned();
            $table->foreign('idnota')->references('id')->on('notas')->onDelete('cascade');
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
        Schema::drop('archinotas');
    }
}
