<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntiNomina extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nmentidades';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nit','nombre','tipo'];

    public $timestamps = false;
}
