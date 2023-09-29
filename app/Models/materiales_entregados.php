<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ? Importaciones extra
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class materiales_entregados extends Model
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
