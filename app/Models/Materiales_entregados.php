<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class Materiales_entregados extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicita ya que el modelo y la migracion estan en plural
    protected $table = 'materiales_entregados';

    protected $fillable = [
        'folio_vale',
        'cantidad',
        'unidad_medida',
        'concepto',
        'id_par_ppta',
        'precio_unitario',
    ];

    protected $encryptable = [
        'folio_vale',
        'cantidad',
        'unidad_medida',
        'concepto',
        'precio_unitario',
    ];

    // RELACION UNO A UNO INVERSA   

    public function Partidas_presupuestales(){
        return $this->belongsTo(Partidas_presupuestales::class);
    }

    public function Vales_entrada_material(){
        return $this->belongsTo(Vale_salida_material::class);
    }

}
