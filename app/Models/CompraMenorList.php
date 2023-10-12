<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class CompraMenorList extends Model
{
    use HasFactory,EncryptableDbAttribute;

    // Relacion explicita debido al nombre y a los guiones bajo
    protected $table = 'compra_menor_lists';

    protected $fillable = [
        'icm_folio',
        'icm_cantidad',
        'icm_unidad_medida',
        'icm_concepto',
        'icm_par_ppta',
        'icm_precio_u',
        'icm_importe',
    ];

    protected $encryptable  = [
        'icm_folio',
        'icm_cantidad',
        'icm_unidad_medida',
        'icm_concepto',
        'icm_precio_u',
        'icm_importe'
    ];


    protected $primaryKey = 'id';

    // RELACION UNO A UNO (INVERSO)
    public function CompraMenor(){
        return $this->belongsTo(CompraMenor::class);
    }

    public function Partidas_presupuestales(){
        return $this->belongsTo(Partidas_presupuestales::class);
    }
}
