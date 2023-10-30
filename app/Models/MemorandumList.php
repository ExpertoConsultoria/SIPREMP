<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class MemorandumList extends Model
{
    use HasFactory,EncryptableDbAttribute;

    protected $table = 'memorandum_lists';

    protected $fillable = [
        'im_folio',
        'im_cantidad',
        'im_unidad_medida',
        'im_concepto',
        'im_partida_presupuestal',
        'im_precio_u',
        'im_importe',
    ];

    protected $encryptable  = [
        'im_cantidad',
        'im_unidad_medida',
        'im_concepto',
        'im_precio_u',
        'im_importe',
        'im_partida_presupuestal',
    ];


    protected $primaryKey = 'id';

    // RELACION UNO A UNO (INVERSO)
    public function Memorandum(){
        return $this->belongsTo(Memorandum::class);
    }

    public function Partidas_presupuestales(){
        return $this->belongsTo(Partidas_presupuestales::class);
    }
}
