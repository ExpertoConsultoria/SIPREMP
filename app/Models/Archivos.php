<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class Archivos extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicita ya que la migracion y el modelo estan en plural
    protected $table = 'archivos';

    protected $fillable = [
        'fecha',
        'lugar',
        'folio',
        'NoFin',
        'NoProposito',
        'NoComponente',
        'NoActividad',
        'titulo',
        'descripcion',
        'archivo_pdf',
    ];

    protected $encryptable = [
        'titulo',
        'descripcion',
    ];

    public function Vales_compra(){
        return $this->hasOne(Vales_compra::class);
    }
}
