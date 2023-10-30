<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;


class plan1_fin extends Model
{
    use HasFactory, EncryptableDbAttribute;

    // Relacion explicita ya que estaba como "plan1_fin"
    protected $table = 'plan1_fins';
    
    protected $fillable =[
        'Ejercicio',
        'NoFin',
        'DescFin',
        'user_id'
    ];

    protected $encryptable  = [
        'Ejercicio',
        'NoFin',
        'DescFin',
        'user_id'
    ];

    //Relacion uno a uno 
    public function Memorandum(){
        return $this->hasOne(Memorandum::class);
    }

}
//