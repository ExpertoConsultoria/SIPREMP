<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan2Proposito extends Model
{
    protected $table = 'plan2_propositos';

    protected $primaryKey = 'id';

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function plan1Fin(): BelongsTo
    {
        return $this->belongsTo(Plan1Fin::class);
    }

    public function plan3Componente() {
        return $this->hasOne('App\Models\Plan3Componente', 'id', 'plan2_proposito_id');
    }

    public function plan4Actividad() {
        return $this->hasOne('App\Models\Plan4Actividad', 'id', 'plan2_proposito_id');
    }
}
