<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;


class plan2_propositos extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicta debido al nombre "plan2_propositos" del modelo
    protected $table = 'plan2_propositos';

    protected $fillable = [
        'NoProposito',
        'DescProposito',
        'plan1_fin_id',
        'user_id'
    ];

    protected $encryptable  = [
        'NoProposito',
        'DescProposito',
        'plan1_fin_id',
        'user_id'
    ];

    //Relacion uno a uno 
    public function Memorandum(){
        return $this->hasOne(Memorandum::class);
    }


}
