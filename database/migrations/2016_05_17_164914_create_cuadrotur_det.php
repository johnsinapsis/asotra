<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuadroturDet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nmcuadroturno_det', function (Blueprint $table) {
            $table->integer('id_cuadrotur')->unsigned();
            $table->integer('id_emp')->unsigned();
            $table->integer('id_horario')->unsigned();
            $table->char('dia',1);
            $table->timestamps();
            $table->primary(array('id_cuadrotur', 'id_emp','id_horario','dia'));
            $table->foreign('id_cuadrotur')->references('id')->on('nmcuadroturno_cab')->onDelete('cascade');
            $table->foreign('id_emp')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('id_horario')->references('id')->on('nmhorario_cab')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nmcuadroturno_det');
    }
}
