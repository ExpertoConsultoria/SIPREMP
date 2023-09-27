<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class CompraMenorList extends Model
{
    use HasFactory,EncryptableDbAttribute;

    protected $table = 'compra_menor_lists';

    protected $fillable = [
        'icm_folio',
        'icm_cantidad',
        'icm_unidad_medida',
        'icm_concepto',
        'icm_partida_presupuestal',
        'icm_precio_u',
        'icm_importe',
    ];

    protected $encryptable  = [
        'icm_folio',
        'icm_cantidad',
        'icm_unidad_medida',
        'icm_concepto',
        'icm_partida_presupuestal',
        'icm_precio_u',
        'icm_importe',
    ];


    protected $primaryKey = 'id';
}
