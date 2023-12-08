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
        'fecha_registro',
        'lugar_registro',
        'folio',
        'arch_nombre',
        'arch_descripcion',
        'arch_extension',
        'arch_ruta',
    ];

    protected $encryptable = [
        'arch_nombre',
        'arch_descripcion',
        'arch_extension',
        'lugar_registro',
    ];

    public function Vales_compra(){
        return $this->hasOne(Vales_compra::class);
    }

    public function Memorandum(): BelongsTo
    {
        return $this->belongsTo(Memorandum::class);
    }

    public function ValeCompra(): BelongsTo
    {
        return $this->belongsTo(Vales_compra::class);
    }
}
