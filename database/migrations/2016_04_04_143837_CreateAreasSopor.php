<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasSopor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas_sopor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_area',150);
            $table->boolean('estado')->default(true);
            $table->string('obs_area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('areas_sopor');
    }
}
