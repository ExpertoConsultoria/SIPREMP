<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class Materiales_recibidos extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicita ya que el modelo y la migracion estan en plural
    protected $table = 'materiales_recibidos';

    protected $fillable = [
        'folio_vale',
        'cantidad',
        'partida_presupuestal_id',
        'precio_unitario',
        'folio_vale_entrada'
    ];

    protected $encryptable = [
        'unidad_medida',
        'concepto',
        'importe',
    ];

    // public function Vales_entrada_material(){
    //     return $this->belongsTo(Vales_entrada_material::class);
    // }

    // public function Partidas_presupuestales(){
    //     return $this->belongsTo(Partidas_presupuestales::class);
    // }
}
