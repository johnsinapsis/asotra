<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Festivo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'par_festivos';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','nomfiesta'];

    public $timestamps = false;
}
