<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedores_temporales extends Model
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

    public function compraMenor(): BelongsTo
    {
        return $this->belongsTo(CompraMenor::class);
    }
}
