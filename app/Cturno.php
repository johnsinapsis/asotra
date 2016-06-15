<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cturno extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nmcturnos_cab';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nomcuadro','estado'];

    public $timestamps = false;
}
