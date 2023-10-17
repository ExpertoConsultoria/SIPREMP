<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class Expediente extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Por si acaso, ya que el modelo estaba como "Expedientes y lo cambie a singular"
    protected $table = 'expedientes';

    protected $fillable = [
        'folio',
        'folio_memorandum',
        'id_cotizacion',
        'folio_vale_compra',
        'id_factura',
        'folio_vale_entrada',
        'id_evd_foto',
    ];

    // SIN  VALORES ENCRYPTABLES, AUN...
    // protected $encryptable = [
    //     'folio',
    //     'folio_memorandum',
    //     'id_cotizacion',
    //     'folio_vale_compra',
    //     'id_factura',
    //     'folio_vale_entrada',
    //     'id_evd_foto',
    //     'info_extra'
    // ];

        // RELACION UNO A UNO (INVERSO)
        public function memorandum(){
            return $this->belongsTo(Memorandum::class);
        }

        public function ValeEntraMaterial(){
            return $this->belongsTo(Vales_entrada_material::class);
        }

        public function ValesCompra(){
            return $this->belongsTo(Vales_compra::class);
        }

}
