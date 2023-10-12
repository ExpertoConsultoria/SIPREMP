<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;
use App\Models\Expediente;

class Memorandum extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicita debido a un algo raro en el eloquent de Laravel
    protected $table = 'memoranda';

    protected $fillable = [
        'fecha',
        'folio',
        'id_solicitante',
        'lugar',
        'id_destinatario',
        'asunto',
        'NoFin',
        'NoActividad',
        'NoComponente',
        'NoProposito',
        'lista_compra',
        'cotizacion',
        'token_solicitante',
        'token_recepcion',
    ];

    // protected $encryptable = [
    //     'folio',
    //     'asunto',
    //     'NoFin',
    //     'NoActividad',
    //     'NoComponente',
    //     'NoProposito',
    //     'cotizacion',
    //     'token_solicitante',
    //     'token_recepcion'
    // ];

    // RELACION UNO A UNO
    public function expediente(){
        return $this->hasOne(Expediente::class);
    }

    public function Elementos_memorandum(){
        return $this->hasOne(Elementos_memorandum::class);
    }

    public function Materiales_oficina(){
        return $this->hasOne(Materiales_oficina::class);
    }

    //RELACION UNO A UNO INVERSA
    public function Plan4_actividad(){
        return $this->belongsTo(plan4_actividad::class);
    }

    public function Plan3_componentes(){
        return $this->belongsTo(plan3_componentes::class);
    }

    public function Plan2_propositos(){
        return $this->belongsTo(plan2_propositos::class);
    }

    public function Plan1_fin(){
        return $this->belongsTo(plan1_fin::class);
    }

}
