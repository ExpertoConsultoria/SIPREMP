<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Ppto4PartEspecifica
 *
 * @property $id
 * @property $PartidaEspecifica
 * @property $PartidaEspecificaNombre
 * @property $PartidaEspecificaDescripcion
 * @property $created_at
 * @property $updated_at
 * @property $ppto3_part_generica_id
 *
 * @property Ppto3PartGenerica $ppto3PartGenerica
 * @property PptoDeEgreso[] $pptoDeEgresos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ppto4PartEspecifica extends Model
{

    static $rules = [
		'PartidaEspecifica' => 'required',
		'PartidaEspecificaNombre' => 'required',
		'PartidaEspecificaDescripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['PartidaEspecifica','PartidaEspecificaNombre','PartidaEspecificaDescripcion','ppto3_part_generica_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ppto3PartGenerica()
    {
        return $this->hasOne('App\Models\Ppto3PartGenerica', 'id', 'ppto3_part_generica_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pptoDeEgresos()
    {
        return $this->hasMany('App\Models\PptoDeEgreso', 'ppto4_part_especifica_id', 'id');
    }

    public function ComprobantesConceptos(): BelongsTo
    {
        return $this->belongsTo(ComprobanteConcepto::class);
    }

}
