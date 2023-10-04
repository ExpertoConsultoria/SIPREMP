<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraMenor extends Model
{
    use HasFactory;

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

    protected $casts = [
        'sucursal' => 'encrypted',

        'mir_id_fin' => 'encrypted',
        'mir_id_proposito' => 'encrypted',
        'mir_id_componente' => 'encrypted',
        'mir_id_actividad' => 'encrypted',

        'cm_subtotal' => 'encrypted',
        'cm_iva' => 'encrypted',
        'cm_total' => 'encrypted',
        'token_aceptacion' => 'encrypted',
    ];

    protected $primaryKey = 'id';
}
