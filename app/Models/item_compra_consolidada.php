<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_compra_consolidada extends Model
{
    use HasFactory;
    protected $fillable = [
        'compra_consolidada_id',
        'cantidad',
        'concepto',
        'precio_unitario',
        'importe',
        'partida_presupuestal',
        'subtotal',
        'iva',
        'total',
    ];

    protected $encryptable = [

    ];
}
