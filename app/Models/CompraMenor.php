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
    ];

    protected $encryptable  = [
        'cm_folio',
        'cm_asunto',
        'mir_id_fin',
        'mir_id_proposito',
        'mir_id_componente',
        'mir_id_actividad',
        'lista_cotizacion',
        'cm_subtotal',
        'cm_iva',
        'cm_total',
        'token_solicitud',
        'token_aceptacion'
    ];


    protected $primaryKey = 'cm_folio';

    // RELACION UNO A UNO
    public function ComparaMenorList(){
        return $this->hasOne(CompraMenorList::class);
    }
}
