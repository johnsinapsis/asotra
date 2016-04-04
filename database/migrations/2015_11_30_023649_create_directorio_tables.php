<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorioTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('directorio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dependencia',150);
            $table->enum('tipo',['administrativo','asistencial']);
            $table->string('nombre', 150);
            $table->string('extension',50);
            $table->string('linea_fija',50);
            $table->string('celular',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('directorio');
    }
}
