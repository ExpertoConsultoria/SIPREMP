<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan4Actividad extends Model
{
    protected $connection = 'mysql_second';
    protected $table = 'plan4_actividads';

    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }

    public function plan1Fin(): BelongsTo
    {
        return $this->belongsTo(Plan1Fin::class);
    }

    public function plan2Proposito(): HasOne
    {
        return $this->hasOne(Plan2Proposito::class);
    }

    public function plan3Componente(): HasOne
    {
        return $this->hasOne(Plan3Componente::class);
    }
}
