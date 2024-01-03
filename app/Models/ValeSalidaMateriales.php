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
        'folio',
        'id_solicitante',
        'id_encargado_entrega',
        'fecha',
        'lugar',
    ];
    
    protected $encryptable = [
        'token_solicitante',
        'token_entrega',
        'estatus_SG',
    ];
}
