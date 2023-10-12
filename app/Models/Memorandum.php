<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memorandum extends Model
{
    use HasFactory;

    protected $table = 'memoranda';

    protected $fillable = [
        'memo_fecha',
        'memo_folio',
        'solicitante_id',
        'memo_sucursal',
        'destinatario',

        'memo_asunto',
        'mir_id_fin',
        'mir_id_proposito',
        'mir_id_componente',
        'mir_id_actividad',
        'memo_id_cotizacion',

        'token_aceptacion',
        'memo_creation_status'
    ];

    protected $casts = [
        'memo_sucursal' => 'encrypted',
        'destinatario' => 'encrypted',

        'mir_id_fin' => 'encrypted',
        'mir_id_proposito' => 'encrypted',
        'mir_id_componente' => 'encrypted',
        'mir_id_actividad' => 'encrypted',
        'token_aceptacion' => 'encrypted',
    ];

    protected $primaryKey = 'id';

    public function solicitante() {
        return $this -> belongsTo(User::class, 'solicitante_id');
    }
    public function memorandumList() {
        return $this -> belongsTo(User::class, 'im_folio');
    }
}
