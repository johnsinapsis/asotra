<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CturnoEmp extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nmcturnos_det';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_turno','id_emp'];

    public $timestamps = false;
}
