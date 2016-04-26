<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_emp',20);
            $table->integer('tipo_id')->unsigned; 
            $table->string('ape1_emp',15);
            $table->string('ape2_emp',15);
            $table->string('nom1_emp',15);
            $table->string('nom2_emp',15);
            $table->integer('estado')->unsigned; 
            $table->date('fec_nac');
            $table->integer('pais_nac',11);
            $table->char('depto_nac',2);
            $table->char('ciudad_nac',3);
            $table->char('sexo',1);
            $table->char('est_civ',1);
            $table->date('fec_ing');
            $table->string('dir_emp');
            $table->string('tel_emp');
            $table->string('cel_emp');
            $table->string('mail_emp');
            $table->date('fec_ing');
            $table->date('fec_egr');
            $table->integer('id_prof')->unsigned();
            $table->integer('ocupacion')->unsigned();
            $table->integer('id_modcon')->unsigned(); 
            $table->integer('idcargo')->unsigned();
            $table->integer('id_tipocon')->unsigned();
            $table->integer('id_fpen')->unsigned();
            $table->integer('id_eps')->unsigned();
            $table->integer('id_ces')->unsigned();
            $table->integer('id_caja')->unsigned();
            $table->integer('id_arl')->unsigned();
            $table->integer('id_jor')->unsigned();
            $table->integer('id_forpag')->unsigned();
            $table->integer('id_banco')->unsigned();
            $table->decinal('salbasico',18,0);
            $table->foreign('tipo_id')->references('id')->on('tipo_ident')->onDelete('cascade');
            $table->foreign('estado')->references('id')->on('nmestados')->onDelete('cascade');
            $table->foreign('pais_nac')->references('id')->on('par_pais')->onDelete('cascade');
            $table->foreign('id_prof')->references('id')->on('par_profesion')->onDelete('cascade');
            $table->foreign('id_modcon')->references('id')->on('par_modcon')->onDelete('cascade');
            $table->foreign('id_tipocon')->references('id')->on('nmtipocon')->onDelete('cascade');
            $table->foreign('idcargo')->references('id')->on('nmcargos')->onDelete('cascade');
            $table->foreign('id_fpen')->references('id')->on('nmentidades')->onDelete('cascade');
            $table->foreign('id_eps')->references('id')->on('nmentidades')->onDelete('cascade');
            $table->foreign('id_ces')->references('id')->on('nmentidades')->onDelete('cascade');
            $table->foreign('id_caja')->references('id')->on('nmentidades')->onDelete('cascade');
            $table->foreign('id_arl')->references('id')->on('nmentidades')->onDelete('cascade');
            $table->foreign('id_banco')->references('id')->on('nmentidades')->onDelete('cascade');
            $table->foreign('id_forpag')->references('id')->on('nmforpago')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
