<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
//use App\Models\Org2Area;

/**
 * Class Org1Sede
 *
 * @property $id
 * @property $Clave
 * @property $SedeNombre
 * @property $Serie
 * @property $Region
 * @property $Direccion
 * @property $Telefono
 * @property $Horario
 * @property $Activa
 * @property $id_gerencia
 * @property $created_at
 * @property $updated_at
 *
 * @property Org2Area[] $org2Areas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Org1Sede extends Model
{

    static $rules = [
		'Clave' => 'required',
		'SedeNombre' => 'required',
		'Serie' => 'required',
		'Region' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Clave','SedeNombre','Serie','Region','Direccion','Telefono','Horario','Activa','id_gerencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Areas(): HasMany
    {
        //return $this->hasMany('App\Models\Org2Area', 'org1_sede_id', 'id');
        return $this->hasMany(Org2Area::class); //  Sede -tiene muchas- Areas
    }



}
