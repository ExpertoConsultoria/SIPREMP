<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class Partidas_presupuestales extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicita ya que el modelo y la migracion estan en plural
    protected $table = 'partidas_presupuestales';

    protected $fillable = [
        'clave',
        'par_presupuestal'
    ];

    protected $encryptable = [
        'clave',
        'par_presupuestal'
    ];


    //RELACION UNO A UNO
    public function ComparaMenorList(){
        return $this->hasOne(CompraMenorList::class);
    }

    public function Elementos_memorandum(){
        return $this->hasOne(Elementos_memorandum::class);
    }

    public function Materiales_entregados(){
        return $this->hasOne(Materiales_entregados::class);
    }

    public function Materiales_oficina(){
        return $this->hasOne(Materiales_oficina::class);
    }

    public function Materiales_recibiidos(){
        return $this->hasOne(Materiales_recibidos::class);
    }

    public function Elementos_Vales_compra(){
        return $this->hasOne(Elementos_Vales_compra::class);
    }

}
