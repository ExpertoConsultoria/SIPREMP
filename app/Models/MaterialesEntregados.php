<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class MaterialesEntregados extends Model
{
    use HasFactory, EncryptableDbAttribute;

    protected $table = 'materiales_entregados';
    protected $fillable = [
        'folio_vale_salida',
    ];

    protected $encryptable  = [
        'cantidad',
        'unidad_medida',
        'concepto',
        'precio_unitario',
        'partida_presupuestal_id',
    ];

    protected $primaryKey = 'id';
}
