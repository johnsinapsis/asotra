<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'incidentes';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idunidad','iduniinv','iduser','fecinci','horinci','descripcion','causa','tratamiento'];

}
