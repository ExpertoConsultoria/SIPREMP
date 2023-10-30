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
        'folio',
        'fecha',
        'lugar',
        'id_receptor',
        'entrego_material',
        'material_recibido',
        'token_recepcion',
        'token_entrega',
        'estatus_SG',
    ];

    protected $encryptable = [
        'folio',
        'token_recepcion',
        'token_entrega',
        'estatus_SG',
    ];

    // Relacion uno a uno
    public function expediente(){
        return $this->hasOne(Expediente::class);
    }

    public function Materiales_recibiidos(){
        return $this->hasOne(Materiales_recibidos::class);
    }

}
