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
        'info_extra',
    ];

    protected $encryptable  = [
        'folio_vale',
        'cantidad',
        'unidad_medida',
        'concepto',
        'precio_unitario',
        'id_par_pres',
    ];

    protected $primaryKey = 'id';
}
