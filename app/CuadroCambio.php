<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuadroCambio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nmcuadrocambio';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cuadro','idemple_or','dia_or','idhorario_or','idemple_des','dia_des','idhorario_des','idusu'];
}
