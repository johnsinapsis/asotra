<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archicaso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sopor_archicasos';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_caso','nombre','rutafile','usureg'];
}
