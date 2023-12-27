<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compra_consolidada extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'folio',
        'justificacion',
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
        'mir_id_cotizacion',
    ];
}
