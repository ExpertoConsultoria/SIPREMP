<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ppto2Concepto
 *
 * @property $id
 * @property $Concepto
 * @property $ConceptoNombre
 * @property $created_at
 * @property $updated_at
 * @property $ppto1_capitulo_id
 *
 * @property Ppto1Capitulo $ppto1Capitulo
 * @property Ppto3PartGenerica[] $ppto3PartGenericas
 * @property PptoDeEgreso[] $pptoDeEgresos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ppto2Concepto extends Model
{

    static $rules = [
		'Concepto' => 'required',
		'ConceptoNombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Concepto','ConceptoNombre','ppto1_capitulo_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ppto1Capitulo()
    {
        return $this->hasOne('App\Models\Ppto1Capitulo', 'id', 'ppto1_capitulo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ppto3PartGenericas()
    {
        return $this->hasMany('App\Models\Ppto3PartGenerica', 'ppto2_concepto_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pptoDeEgresos()
    {
        return $this->hasMany('App\Models\PptoDeEgreso', 'ppto2_concepto_id', 'id');
    }
}
