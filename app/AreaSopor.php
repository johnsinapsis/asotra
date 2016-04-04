<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaSopor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'areas_sopor';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom_area','estado','obs_area'];

    public $timestamps = false;
}
