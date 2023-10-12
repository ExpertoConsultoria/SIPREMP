<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class ReporteCM extends Model
{
    use HasFactory,EncryptableDbAttribute;

    protected $table = 'reportes_cm';

    protected $fillable = [
        'rcm_ejercicio',
        'rcm_inicio',
        'rcm_fin',
        'rcm_partida_presupuestal',
        'rcm_folios_cm',

        'rcm_area',
        'rcm_sucursal',
        'rcm_monto_gral',
    ];

    protected $casts = [
        'rcm_folios_cm' => 'array',
    ];

    protected $encryptable  = [
        'rcm_area',
        'rcm_sucursal',
        'rcm_monto_gral',
    ];


    protected $primaryKey = 'id';
}
