<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan1Fin extends Model
{
    protected $connection = 'mysql_second';
    protected $table = 'plan1_fins';

    protected $primaryKey = 'id';


    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function plan2Fin(): HasMany
    {
        return $this->hasMany(Plan2Proposito::class);
    }

    public function plan3Componente(): HasMany
    {
        return $this->hasMany(Plan3Componente::class);
    }

    public function plan4Actividad(): HasMany
    {
        return $this->hasMany(Plan4Actividad::class);
    }
}
