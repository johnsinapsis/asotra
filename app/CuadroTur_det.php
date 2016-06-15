<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuadroTur_det extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nmcuadroturno_det';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cuadrotur','id_emp','id_horario','numdia','dia'];
}
