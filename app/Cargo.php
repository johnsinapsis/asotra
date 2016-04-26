<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nmcargos';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nomcargo','idjefe'];

    public $timestamps = false;
}
