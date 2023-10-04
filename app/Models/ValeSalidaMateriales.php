<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class ValeSalidaMateriales extends Model
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
