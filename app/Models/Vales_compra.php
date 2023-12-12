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
        'id_proveedor',
        'justificacion',
        'lugar_entrega',
        'fecha_entrega',
        'subtotal',
        'iva',
        'total_compra',
        'folio_solicitud',
        'tipo_proveedor',

        'id_cotizacion',
        'id_factura',
        'id_evidencia',
        'id_vale_firmado',

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
        return $this->hasMany(Elementos_Vale_compra::class);
    }

    public function solicitante()
    {
        return $this->hasOne(User::class, 'id', 'id_usuario');
    }

    public function cotizacion() {
        return $this->hasOne(Archivos::class, 'id', 'id_cotizacion');
    }
    public function factura() {
        return $this->hasOne(Archivos::class, 'id', 'id_factura');
    }
    public function evidencia() {
        return $this->hasOne(Archivos::class, 'id', 'id_evidencia');
    }
    public function vale_firmado() {
        return $this->hasOne(Archivos::class, 'id', 'id_vale_firmado');
    }
}
