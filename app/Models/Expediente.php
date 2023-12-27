<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    // Por si acaso, ya que el modelo estaba como "Expedientes y lo cambie a singular"
    protected $table = 'expedientes';

    protected $fillable = [
        'exp_folio',
        'fecha',
        'concepto',
        'id_cotizacion',
        'id_factura',
        'id_evd_foto',
        'id_vale_firmado',
        'memoranda_id',
        'vales_compra_id',
    ];


        // RELACION UNO A UNO (INVERSO)
        public function memorandum(){
            return $this->hasOne(Memorandum::class, 'id', 'memoranda_id');
        }

        // public function ValeEntraMaterial(){
        //     return $this->belongsTo(Vales_entrada_material::class);
        // }

        public function ValesCompra(){
            return $this->hasOne(Vales_compra::class, 'id', 'vales_compra_id');
        }

}
