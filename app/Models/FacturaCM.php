<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class FacturaCM extends Model
{
    use HasFactory,EncryptableDbAttribute;

    protected $primaryKey = 'id';
    protected $table = 'facturas_cm';

    protected $fillable = [
        'fcm_nombre',
        'fcm_extension',
        'fcm_ruta',
    ];

    protected $encryptable  = [
        'fcm_nombre',
        'fcm_extension',
        // 'fcm_ruta',
    ];


    public function compraMenor(): BelongsTo
    {
        return $this->belongsTo(CompraMenor::class);
    }
}
