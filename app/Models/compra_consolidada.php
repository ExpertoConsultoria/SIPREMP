<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class compra_consolidada extends Model
{
    use HasFactory, EncryptableDbAttribute;
    protected $fillable = [
        'fecha',
        'folio',
        'justificacion',
        'sucursal',
        'area',
        // ? Anexo CompraCons
        'asunto',
        'objeto',
        'alcance',
        'procedimiento_entrega',
        'entregables',
        'muestras',
        'recursos_humanos',
        'soporte_tecnico',
        'mantenimiento',
        'capacitacion',
        'vigencia',
        'forma_pago',
        'garantia',
        // ATRIBUTOS MIR
        'mir_id_fin',
        'mir_id_proposito',
        'mir_id_componente',
        'mir_id_actividad',
        'mir_id_cotizacion',

        'id_proveedor',
        'tipo_proveedor',
        
        'estado',
        'token_aceptacion',
    ];

    protected $encryptable = [

    ];
}
