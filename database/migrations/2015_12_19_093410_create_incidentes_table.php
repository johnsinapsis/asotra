<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idunidad')->unsigned();
            $table->integer('iduniinv')->unsigned();
            $table->integer('iduser')->unsigned();
            $table->date('fecinci');
            $table->time('horinci');
            $table->text('descripcion');
            $table->text('causa');
            $table->text('tratamiento');
            $table->timestamps();
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('incidentes');
    }
}
