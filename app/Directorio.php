<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'directorio';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dependencia', 'nombre', 'tipo','extension'];
}
