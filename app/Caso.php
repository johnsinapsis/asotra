<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sopor_casos';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fec_caso','titulo','id_tipsopor','id_areasopor','descripcion','estado','usureg','usuasig','usucierra','notacierre'];
}
