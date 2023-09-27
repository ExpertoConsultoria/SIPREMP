<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ppto1Capitulo
 *
 * @property $id
 * @property $Capitulo
 * @property $CapituloNombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Ppto2Concepto[] $ppto2Conceptos
 * @property PptoDeEgreso[] $pptoDeEgresos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ppto1Capitulo extends Model
{

    static $rules = [
		'Capitulo' => 'required',
		'CapituloNombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Capitulo','CapituloNombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ppto2Conceptos()
    {
        return $this->hasMany('App\Models\Ppto2Concepto', 'ppto1_capitulo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pptoDeEgresos()
    {
        return $this->hasMany('App\Models\PptoDeEgreso', 'ppto1_capitulo_id', 'id');
    }


}
