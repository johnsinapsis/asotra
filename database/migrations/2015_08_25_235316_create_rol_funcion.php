<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolFuncion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_funcion',function(Blueprint $table) {
            $table->integer('id_funcion')->unsigned()->nullable();
            $table->integer('id_role')->unsigned()->nullable(); 
            $table->primary(array('id_funcion', 'id_role'));
            $table->foreign('id_funcion')->references('id')->on('funciones')->onDelete('cascade');
           $table->foreign('id_role')->references('id')->on('perfiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_funcion'); 
    }
}
