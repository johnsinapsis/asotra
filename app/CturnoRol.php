<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CturnoRol extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nmcturnos_usu';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_turno','id_usu','usu_rol'];

    public $timestamps = false;
}
