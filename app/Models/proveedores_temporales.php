<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedores_temporales extends Model
{

    // static $rules = [
	// 	'RFC' => 'required',
	// 	'RazonSocial' => 'required',
	// 	'CodigoPostal' => 'required',
    // ];

    // protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nombre',
        'RFC',
        'RazonSocial',
        'Telefono',
        'Regimen',
        'Direccion',
        'CodigoPostal',
        'DatosContacto',
        'DatosBanco'
    ];

    public $encryptable = [
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id');
    }

    // public function compraMenor(): BelongsTo
    // {
    //     return $this->belongsTo(CompraMenor::class);
    // }
}
