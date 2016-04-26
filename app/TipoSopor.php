<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSopor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sopor_tipo';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','estado'];
}
