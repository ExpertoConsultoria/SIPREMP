<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class plan4_actividad extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicta debido al nombre "plan4_actividad" del modelo
    protected $table = 'plan4_actividad';

    protected $fillable = [
        'NoActiviadad',
        'DescActividad',
        'org2_area_id',
        'plan3_componente_id',
        'plan2_proposito_id',
        'plan1_fin_id',
        'user_id'
    ];

    protected $encryptable  = [
        'NoActiviadad',
        'DescActividad',
        'org2_area_id',
        'plan3_componente_id',
        'plan2_proposito_id',
        'plan1_fin_id',
        'user_id'
    ];

    //Relacion uno a uno 
    public function Memorandum(){
        return $this->hasOne(Memorandum::class);
    }

}
