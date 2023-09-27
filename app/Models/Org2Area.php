<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

//use App\Models\Org1Sede;

/**
 * Class Org2Area
 *
 * @property $id
 * @property $AreaNombre
 * @property $strNivel
 * @property $SubAreas
 * @property $SubAreasAsignadas
 * @property $created_at
 * @property $updated_at
 * @property $parent_id
 * @property $org1_sede_id
 *
 * @property Org1Sede $org1Sede
 * @property Org2Area $org2Area
 * @property Org2Area[] $org2Areas
 * @property Org3Puesto[] $org3Puestos
 * @property PptoDeEgreso[] $pptoDeEgresos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Org2Area extends Model
{

    static $rules = [
		'AreaNombre' => 'required',
		'strNivel' => 'required',
		'SubAreas' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['AreaNombre','strNivel','SubAreas','SubAreasAsignadas','Activa','parent_id','org1_sede_id'];


    /**
     *  Obtiene las Sede que es propietaria del area
     */
    public function org1Sede(): BelongsTo
    {               //El nombre Org1Sede no pudo ser modificado
        return $this->belongsTo(Org1Sede::class);       //Area que -pertenece a- Sede
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function AreaSup(): HasOne
    {
        //return $this->hasOne('App\Models\Org2Area', 'id', 'parent_id');
        return $this->hasOne(Org2Area::class,'id','parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function AreasAsig(): HasMany
    {
        //return $this->hasMany('App\Models\Org2Area', 'parent_id', 'id');
        return $this->hasMany(Org2Area::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function org3Puestos()
    {
        return $this->hasMany('App\Models\Org3Puesto', 'org2_area_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pptoDeEgresos()
    {
        return $this->hasMany('App\Models\PptoDeEgreso', 'org2_area_id', 'id');
    }
}
