<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan3Componente extends Model
{
    protected $table = 'plan3_componentes';

    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }

    public function plan1Fin(): BelongsTo
    {
        return $this->belongsTo(Plan1Fin::class);
    }

    public function plan4Actividad() {
        return $this->belongsTo('App\Models\Plan4Actividad', 'id', 'plan3_componente_id');
    }

    public function plan2Proposito(): HasOne
    {
        return $this->hasOne(Plan2Proposito::class);
    }
}
