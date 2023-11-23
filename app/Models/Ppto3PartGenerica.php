<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ppto3PartGenerica
 *
 * @property $id
 * @property $PartidaGenerica
 * @property $PartidaGenericaNombre
 * @property $created_at
 * @property $updated_at
 * @property $ppto2_concepto_id
 *
 * @property Ppto2Concepto $ppto2Concepto
 * @property Ppto4PartEspecifica[] $ppto4PartEspecificas
 * @property PptoDeEgreso[] $pptoDeEgresos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ppto3PartGenerica extends Model
{

    static $rules = [
		'PartidaGenerica' => 'required',
		'PartidaGenericaNombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['PartidaGenerica','PartidaGenericaNombre','ppto2_concepto_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ppto2Concepto()
    {
        return $this->hasOne('App\Models\Ppto2Concepto', 'id', 'ppto2_concepto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ppto4PartEspecificas()
    {
        return $this->hasMany('App\Models\Ppto4PartEspecifica', 'ppto3_part_generica_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pptoDeEgresos()
    {
        return $this->hasMany('App\Models\PptoDeEgreso', 'ppto3_part_generica_id', 'id');
    }
}
