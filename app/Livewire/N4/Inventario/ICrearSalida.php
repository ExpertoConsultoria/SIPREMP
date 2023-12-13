<?php

namespace App\Livewire\N4\Inventario;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\ValeSalidaMateriales;

use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;
use App\Models\PptoDeEgreso;
use stdClass;

class ICrearSalida extends Component
{
    public $folio;
    public $fecha;
    public $lugar;

    public $userSede;
    public $userSedeCode;
    // public $id_encargado_entrega;
    public $solicitante;
    public $id_solicitante;
    // public $id_solicitante;


    // ** MIR
    public $mir2 = false;
    public $mir3 = false;
    public $mir4 = false;

    public $fin_mir = '';
    public $proposito_mir = '';
    public $componente_mir = '';
    public $actividad_mir = '';
    // Select Data
    public $fines_mir = [];
    public $propositos_mir = [];
    public $componetes_mir = [];
    public $actividades_mir = [];
    public $partidas_presupuestales = [];
    public $selectPartida = [];

    /** ITEM DATA */
    public $itemSalida = [];
    public $cantidad;
    public $unidad_medida;
    public $precio_unitario;
    public $concepto;
    public $partida_presupuestal;
    
    public $subtotal = 0;


    protected function rules()
    {
        return [
            'cantidad' => 'required|numeric',
            'unidad_medida' => 'required|string',
            'concepto' => 'required|string',
            'precio_unitario' => 'required|numeric',
            'partida_presupuestal_id' => 'required',
        ];
    }

    protected $messages = [
        'fecha.required' => 'Este campo es Obligatorio.',
        'fecha.date' => 'No es una fecha.',

        'cantidad' => 'Este campo es Obligatorio',
        'unidad_medida' => 'Este campo es Obligatorio',
        'concepto' => 'Este campo es Obligatorio',
        'precio_unitario' => 'Este campo es Obligatorio',
        'partida_presupuestal_id' => 'Este campo es Obligatorio',
    ];


    public function render()
    {
        return view('livewire.n4.inventario.i-crear-salida');
    }

    public function mount() {
        $this->fecha = date("Y-m-d");
        $this->folio = "SGV-EI-00000";

        $this->userSede = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->SedeNombre;
        $this->userSedeCode = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->Serie;
        $this->lugar = $this->userSede;

        $this -> solicitante = Auth::user() -> name;
        $this -> id_solicitante = Auth::user() -> id;

        $this->fines_mir = Plan1Fin::all();
        $this->partidas_presupuestales = PptoDeEgreso::all();
    }

    public function setPartidaP($value, $id) {
        $this -> items_inventario[$id] -> partida_presupuestal = $value;
    }

    // Forge MIR
    public function GetProposes($value) {
        $this->mir2 = true;
        $this->propositos_mir = Plan2Proposito::where('plan1_fin_id', $value)->get()->toArray();
        $this->mir3 = false;
        $this->mir4 = false;
        $this->proposito_mir = '';
        $this->componente_mir = '';
        $this->actividad_mir = '';
    }

    public function GetComponents($value) {
        $this->mir3 = true;
        $this->componetes_mir = Plan3Componente::where('plan2_proposito_id', $value)->get()->toArray();
        $this->mir4 = false;
        $this->componente_mir = '';
        $this->actividad_mir = '';
    }

    public function GetActivities($value) {
        $this->mir4 = true;
        $this->actividades_mir = Plan4Actividad::where('plan3_componente_id', $value)->get()->toArray();
        $this->actividad_mir = '';
    }

    public function AddToList(){

        $validatedData = $this->validate([
            'cantidad' => 'required|numeric',
            'unidad_medida' => 'required|string',
            'concepto' => 'required|string',
            'precio_unitario' => 'required|numeric',
        ]);

        $item = new stdClass;
        $item->cantidad = $this->cantidad;
        $item->unidad_medida = $this->unidad_medida;
        $item->concepto = $this->concepto;
        $item->precio_unitario = $this->precio_unitario;
        $item->partida_presupuestal_id = $this->partida_presupuestal;

        array_push($this->itemSalida, $item);

        $this->reset([
            'cantidad',
            'unidad_medida',
            'concepto',
            'p_u',
            'importe'
        ]);
        $this->partida_presupuestal = '';

        $this->CalculateTotals();
        $this->dispatch('simpleAlert','Agregado correctamente','success');
    }

    public function saveSalida() {
        $this -> validate();
        $this->folio = Helper::FolioGenerator(new ValeSalidaMateriales, 'vale_folio', 5, 'SI', $this->userSedeCode);

        $valeSalida = ValeSalidaMateriales::create([
            'folio' => $this -> folio,
            'fecha' => $this -> fecha,
            'lugar' => $this -> lugar,
            'id_solicitante' => $this -> id_solicitante
        ]);

        foreach($this -> itemSalida as $items) {
            $items -> folio = $valeSalida -> folio;
        }

    }
}
