<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class Materiales_oficina extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicita ya que tanto la migracion como el modelo estan en plural
    protected $table = 'materiales_oficina';

    protected $fillable = [
        'folio_vale',
        'folio_memorandum',
        'id_par_ppta',
        'unidad_medida',
        'cantidad',
        'concepto',
    ];

    protected $encryptable = [
        'folio_vale',
        'folio_memorandum',
        'unidad_medida',
        'cantidad',
        'concepto',
    ];

    // RELACION UNO A UNO (INVERSO)
    public function memorandum(){
        return $this->belongsTo(Memorandum::class);
    }

    public function Partidas_presupuestales(){
        return $this->belongsTo(Partidas_presupuestales::class);
    }
}
