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
        'folio_compra',
        'cantidad',
        'unidad_medida',
        'concepto',
        'id_par_ppta',
        'precio_unitario',
        'importe',
    ];

    protected $encryptable = [
        'folio_compra',
        'cantidad',
        'unidad_medida',
        'concepto',
        'precio_unitario',
        'importe'
    ];

    public function Partidas_presupuestales(){
        return $this->belongsTo(Partidas_presupuestales::class);
    }

    public function Vales_compra(){
        return $this->belongsTo(Vales_compra::class);
    }


    
}
