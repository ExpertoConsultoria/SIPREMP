<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class ValeSalidaMateriales extends Model
{
    use HasFactory, EncryptableDbAttribute;

    protected $table = 'vale_salida_materials';

    protected $fillable = [
        'folio',
        'fecha',
        'lugar',
        'id_encargado_entrega',
        'id_solicitante',
    ];

    protected $encryptable = [
        'token_solicitante',
        'token_entrega',
        'estatus_SG',
    ];

    // public function Materiales_entregados(){
    //     return $this->hasOne(Materiales_entregados::class);
    // }
}
