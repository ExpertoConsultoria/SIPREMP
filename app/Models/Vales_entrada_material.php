<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class Vales_entrada_material extends Model
{
    use HasFactory , EncryptableDbAttribute;

    // protected $table = 'vales_entrada_materials';

    protected $fillable = [
        'fecha',
        'id_receptor',
        'entrego_material',
    ];

    protected $encryptable = [
        'lugar',
        'folio',
        'asunto',
        'token_recepcion',
        'token_entrega',
        'estatus_SG',
        'mir_id_fin',
        'mir_id_proposito',
        'mir_id_componente',
        'mir_id_actividad'
    ];

    // Relacion uno a uno
    public function expediente(){
        return $this->hasOne(Expediente::class);
    }

    public function Materiales_recibiidos(){
        return $this->hasOne(Materiales_recibidos::class);
    }

}
