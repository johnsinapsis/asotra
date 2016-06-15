<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioDet extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nmhorario_det';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_horario','dia','hora'];

    public $timestamps = false;
}
