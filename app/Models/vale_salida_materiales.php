<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ? Importaciones extra
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class vale_salida_materiales extends Model
{
    use HasFactory, EncryptableDbAttribute;

    protected $table = 'vale_salida_materiales';
    protected $fillable = [
        'fecha',
        'lugar',
        'encargado_entrega',
        'id_solicitante',

        'info_extra',
    ];
    protected $encryptable  = [
        'folio',
        'token_solicitante',
        'token_entrega',
        'estatus_SG'
    ];

    protected $primaryKey = 'id';
}
