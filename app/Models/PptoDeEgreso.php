<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PptoDeEgreso extends Model
{
    static $rules = [
		'Ejercicio' => 'required',
		'Movimiento' => 'required',
		'Presupuesto' => 'required',
		'AutorizacionConsejo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Ejercicio',
        'CvePptal',
        'PartidaEspecifica',
        'Movimiento',
        'Presupuesto',
        'Enero','Febrero','Marzo',
        'Abril','Mayo','Junio',
        'Julio','Agosto','Septiembre',
        'Octubre','Noviembre','Diciembre',
        'AutorizacionConsejo',
        'Nota',
        'user_id',
        'org1_sede_id',
        'ppto1_capitulo_id',
        'ppto2_concepto_id',
        'ppto3_part_generica_id',
        'ppto4_part_especifica_id'
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ppto1Capitulo()
    {
        return $this->hasOne('App\Models\Ppto1Capitulo', 'id', 'ppto1_capitulo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ppto2Concepto()
    {
        return $this->hasOne('App\Models\Ppto2Concepto', 'id', 'ppto2_concepto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ppto3PartGenerica()
    {
        return $this->hasOne('App\Models\Ppto3PartGenerica', 'id', 'ppto3_part_generica_id');
    }


    public function PartEspecifica(): BelongsTo
    {
        return $this->BelongsTo(Ppto4PartEpecifica::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
