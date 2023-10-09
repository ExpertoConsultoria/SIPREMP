<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Org3Puesto
 *
 * @property $id
 * @property $Puesto
 * @property $NUP
 * @property $ClavePuesto
 * @property $TipoPlaza
 * @property $Subordinados
 * @property $SuborAsig
 * @property $Vacante
 * @property $user_id
 * @property $parent_id
 * @property $org2_area_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Org2Area $org2Area
 * @property Org3Puesto $org3Puesto
 * @property Org3Puesto[] $org3Puestos
 * @property Org4Empleado[] $org4Empleados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Org3Puesto extends Model
{

    static $rules = [
		'Puesto' => 'required',
		'TipoPlaza' => 'required',
		'SuborDirect' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Puesto',
        'NUP',
        'ClavePuesto',
        'TipoPlaza',
        'CorreoInstitucional',
        'Telefono',
        'Subordinados',
        'SuborAsignados',
        'Vacante',
        'Activo',
        'parent_id',
        'org2_area_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function org2Area()
    {
        return $this->hasOne('App\Models\Org2Area', 'id', 'org2_area_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function org3Puesto()
    {
        return $this->hasOne('App\Models\Org3Puesto', 'id', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function org3Puestos()
    {
        return $this->hasMany('App\Models\Org3Puesto', 'parent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function org4Empleados()
    {
        return $this->hasMany('App\Models\Org4Empleado', 'org3_puesto_id', 'id');
    }

}
