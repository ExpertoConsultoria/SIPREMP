<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;


class plan3_componentes extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicta debido al nombre "plan3_componentes" del modelo
    protected $table = 'plan3_componentes';

    protected $fillable = [
        'NoComponente',
        'DesComponente',
        'plan2_proposito_id',
        'plan1_fin_id',
        'user_id'
    ];

    protected $encryptable  = [
        'NoComponente',
        'DesComponente',
        'plan2_proposito_id',
        'plan1_fin_id',
        'user_id'
    ];

    //Relacion uno a uno 
    public function Memorandum(){
        return $this->hasOne(Memorandum::class);
    }

}
