<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class Elementos_Vale_compra extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // protected $table = 'elementos_vale_compras';

    protected $fillable = [
        'vales_compra_id',
        'cantidad',
        'unidad_medida',
        'concepto',
        'partida_presupuestal',
        'precio_unitario',
        'importe',
    ];

    protected $encryptable = [
        'cantidad',
        'unidad_medida',
        'concepto',
        'precio_unitario',
        'partida_presupuestal',
        'importe'
    ];

    public function Partidas_presupuestales(){
        return $this->belongsTo(Partidas_presupuestales::class);
    }

    public function Vales_compra(){
        return $this->belongsTo(Vales_compra::class);
    }



}
