<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class Elementos_memorandum extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicita ya que la migracion y el modelo estan en singular
    protected $table = 'elementos_memorandum';

    protected $fillable = [
        'folio_memorandum',
        'cantidad',
        'unidad_medida',
        'concepto',
        'id_par_ppta',
        'precio_unitario',
        'importe',
    ];

    protected $encryptable = [
        'folio_memorandum',
        'cantidad',
        'unidad_medida',
        'concepto',
        'precio_unitario',
        'importe',
    ];

    // RELACION UNO A UNO (INVERSO)
    public function Memorandum(){
        return $this->belongsTo(Memorandum::class);
    }

    public function Partidas_presupuestales(){
        return $this->belongsTo(Partidas_presupuestales::class);
    }

}
