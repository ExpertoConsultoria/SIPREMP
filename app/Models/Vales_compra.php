<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class Vales_compra extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicita ya que la migracionn y el modelo estan en singular
    protected $table = 'vales_compra';

    protected $fillable = [
        'folio',
        'fecha',
        'id_usuario',
        'lugar',
        'NoFin',
        'NoProposito',
        'NoComponente',
        'NoActividad',
        'archivos_id',
        'id_proveedor',
        'justificacion',
        'lugar_entrega',
        'fecha_entrega',
        'subtotal',
        'iva',
        'total_compra',

        'folio_solicitud',

        'token_solicitante',
        'token_rev_val',
        'token_disp_ppta',
        'token_autorizacion',

        'creation_status',
        'pass_filter',
        'motivo_rechazo',
        'pending_review',
    ];

    protected $encryptable = [
        'fecha',
        'lugar',
        'NoFin',
        'NoProposito',
        'NoActividad',
        'id_arch_cotizacion',
        'lugar_entrega',
        'fecha_entrega',
        'subtotal',
        'iva',
        'total_compra',
        'token_solicitante',
        'token_rev_val',
        'token_disp_ppta',
        'token_autorizacion',
        'motivo_rechazo',
    ];

    public function expediente(){
        return $this->hasOne(Expediente::class);
    }

    public function Archivos(){
        return $this->belongsTo(Archivos::class);
    }

    public function Elementos_Vales_compra(){
        return $this->hasOne(Elementos_Vales_compra::class);
    }

    public function solicitante()
    {
        return $this->hasOne(User::class, 'id', 'id_usuario');
    }

}
