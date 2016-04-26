<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoident extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipo_ident';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','abr'];

    public $timestamps = false;
}
