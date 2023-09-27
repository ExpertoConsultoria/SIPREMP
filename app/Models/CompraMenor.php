<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class CompraMenor extends Model
{
    use HasFactory, EncryptableDbAttribute;

    protected $table = 'compra_menors';

    protected $fillable = [
        'cm_fecha',
        'cm_folio',
        'solicitante_id',
        'sucursal',
        'cm_asunto',
        'mir_id_fin',
        'mir_id_proposito',
        'mir_id_componente',
        'mir_id_actividad',
        'cm_subtotal',
        'cm_iva',
        'cm_total',
        'token_solicitud',
        'token_aceptacion',
        'cm_creation_status'
    ];

    protected $encryptable  = [
        'cm_fecha',
        'cm_folio',
        'solicitante_id',
        'sucursal',
        'cm_asunto',
        'mir_id_fin',
        'mir_id_proposito',
        'mir_id_componente',
        'mir_id_actividad',
        'cm_subtotal',
        'cm_iva',
        'cm_total',
        'token_solicitud',
        'token_aceptacion',
        'cm_creation_status'
    ];


    protected $primaryKey = 'cm_folio';
}
