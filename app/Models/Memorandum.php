<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;
use App\Models\Expediente;

class Memorandum extends Model
{
    // use HasFactory, EncryptableDbAttribute;

    // // Relacion explicita debido a un algo raro en el eloquent de Laravel
    // protected $table = 'memoranda';

    // protected $fillable = [
    //     'fecha',
    //     'folio',
    //     'id_solicitante',
    //     'lugar',
    //     'id_destinatario',
    //     'asunto',
    //     'NoFin',
    //     'NoActividad',
    //     'NoComponente',
    //     'NoProposito',
    //     'lista_compra',
    //     'cotizacion',
    //     'token_solicitante',
    //     'token_recepcion',
    // ];

    // // protected $encryptable = [
    // //     'folio',
    // //     'asunto',
    // //     'NoFin',
    // //     'NoActividad',
    // //     'NoComponente',
    // //     'NoProposito',
    // //     'cotizacion',
    // //     'token_solicitante',
    // //     'token_recepcion'
    // // ];

    // // RELACION UNO A UNO
    // public function expediente(){
    //     return $this->hasOne(Expediente::class);
    // }

    // public function Elementos_memorandum(){
    //     return $this->hasOne(Elementos_memorandum::class);
    // }

    // public function Materiales_oficina(){
    //     return $this->hasOne(Materiales_oficina::class);
    // }

    // //RELACION UNO A UNO INVERSA
    // public function Plan4_actividad(){
    //     return $this->belongsTo(plan4_actividad::class);
    // }

    // public function Plan3_componentes(){
    //     return $this->belongsTo(plan3_componentes::class);
    // }

    // public function Plan2_propositos(){
    //     return $this->belongsTo(plan2_propositos::class);
    // }

    // public function Plan1_fin(){
    //     return $this->belongsTo(plan1_fin::class);
    // }

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
