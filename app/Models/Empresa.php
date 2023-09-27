<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 *
 * @property $id
 * @property $RFC
 * @property $RazonSocial
 * @property $Nombre
 * @property $Telefono
 * @property $Regimen
 * @property $Direccion
 * @property $CodigoPostal
 * @property $DatosContacto
 * @property $DatosBanco
 * @property $created_at
 * @property $updated_at
 * @property $user_id
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empresa extends Model
{

    static $rules = [
		'RFC' => 'required',
		'RazonSocial' => 'required',
		'CodigoPostal' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['RFC','RazonSocial','Nombre','Telefono','Regimen','Direccion','CodigoPostal','DatosContacto','DatosBanco','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

}
