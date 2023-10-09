<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Org4Empleado
 *
 * @property $id
 * @property $RFC
 * @property $CURP
 * @property $NUE
 * @property $Nombre
 * @property $ApellidoPaterno
 * @property $ApellidoMaterno
 * @property $Correo
 * @property $Celular
 * @property $Telefono
 * @property $Direccion1
 * @property $Direccion2
 * @property $Direccion3
 * @property $NoIMSS
 * @property $DatoEmergencia
 * @property $Foto
 * @property $Activo
 * @property $MotivoBaja
 * @property $created_at
 * @property $updated_at
 * @property $user_id
 * @property $org3_puesto_id
 *
 * @property Org3Puesto $org3Puesto
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Org4Empleado extends Model
{

    static $rules = [
		'Nombre' => 'required',
		'ApellidoPaterno' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['RFC','CURP','NUE','Nombre','ApellidoPaterno','ApellidoMaterno',
            'Correo','Celular','Telefono','Direccion1','Direccion2','Direccion3','NoIMSS',
            'DatoEmergencia','Foto','Activo','MotivoBaja','user_id','org3_puesto_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function org3puesto()
    {
        return $this->hasOne('App\Models\Org3Puesto', 'id', 'org3_puesto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

}
