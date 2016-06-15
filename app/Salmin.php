<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salmin extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nmsalmin';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['salano','salmin','salauxtra'];

    public $timestamps = false;
}
