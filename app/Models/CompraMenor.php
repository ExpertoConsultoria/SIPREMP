<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraMenor extends Model
{
    use HasFactory;

    // Relacion explicita debido al nombre "compra_menors"
    protected $table = 'compra_menor';

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
        'lista_compra',
        'lista_cotizacion',
        'cm_subtotal',
        'cm_iva',
        'cm_total',
        'cm_creation_status',
        'token_solicitud',
        'token_aceptacion',
        'cm_creation_status',

        'factura_cm_id',
        'empresa_id',
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

    public function empresa(): HasOne
    {
        return $this->hasOne(Empresa::class, 'id', 'empresa_id');
    }

    public function factura() {
        return $this->hasOne(FacturaCM::class, 'id', 'factura_cm_id');
    }
}
