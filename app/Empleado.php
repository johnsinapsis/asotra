<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'empleados';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_emp','tipo_id','ape1_emp','ape2_emp','nom1_emp','nom2_emp','estado','fec_nac','pais_nac','depto_nac','ciudad_nac','sexo','est_civ','dir_emp','tel_emp','cel_emp','mail_emp','fec_ing','fec_egr','id_prof','id_ocupa','id_modcon','idcargo','id_tipocon','id_fpen','id_eps','id_ces','id_caja','id_arl','id_jor','id_forpag','id_banco','num_cta','salbasico'];

    public $timestamps = false;
}
