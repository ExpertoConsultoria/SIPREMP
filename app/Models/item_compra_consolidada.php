<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class item_compra_consolidada extends Model
{
    use HasFactory, EncryptableDbAttribute;
    protected $fillable = [
        'compra_consolidada_id',
        'cantidad',
        'concepto',
        'precio_unitario',
        'partida_presupuestal',
        'total',
        'importe',

        // 'iva',
        // 'subtotal',
    ];

    protected $encryptable = [

    ];
}
