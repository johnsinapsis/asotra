<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioCab extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nmhorario_cab';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['abr','nomhorario','descripcion','id_jornada'];

    public $timestamps = false;
}
