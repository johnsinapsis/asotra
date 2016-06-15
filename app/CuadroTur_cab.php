<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuadroTur_cab extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nmcuadroturno_cab';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idturno','ano','mes','estado','usuela','usurevi','usuapru','fecela','fecrevi','fecapru'];
}
