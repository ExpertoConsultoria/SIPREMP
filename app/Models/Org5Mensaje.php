<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Org5Mensaje extends Model
{
    static $rules = [
		'Mensaje' => 'required',
		'Prioridad' => 'required',
        'tipo'=>'required',
        'status'=>'required',
        'model'=>'required',
        'model_id'=>'required',
        'user_id'=>'required',
        'Destinatarios'=>'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['Mensaje','Prioridad','tipo','status','reglas','model','model_id',
    'caducaXtiempo','caducaXtarea','user_id','Destinatarios_ids'];

}
