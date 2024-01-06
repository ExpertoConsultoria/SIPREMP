<?php

namespace App\Livewire\N4\Inventario;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\ValeSalidaMateriales;
use App\Models\MaterialesEntregados;

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
            'fecha' => 'required',
            'cantidad' => 'required|numeric',
            'unidad_medida' => 'required|string',
            'concepto' => 'required|string',
            'precio_unitario' => 'required|string',
            'partida_presupuestal' => 'required',
        ];
    }

    protected $messages = [
        'fecha.required' => 'La fecha es un campo Obligatorio.',
        'fecha.date' => 'No es una fecha.',

        'cantidad' => 'La cantidad es un campo Obligatorio',
        'unidad_medida' => 'La unidad de medida es un campo Obligatorio',
        'concepto' => 'El concepto es un campo Obligatorio',
        'precio_unitario' => 'El precio unitario es un campo Obligatorio',
        'partida_presupuestal' => 'La partida presupuestal es un campo Obligatorio',
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

    public function AddToList() {

        try {
        $validatedData = $this->validate([
            'cantidad' => 'required|numeric',
            'unidad_medida' => 'required|string',
            'concepto' => 'required|string',
            'precio_unitario' => 'required',
            'partida_presupuestal' => 'required',
        ]);
        // dd($validatedData);

        $item = new stdClass;
        $item -> cantidad = $this -> cantidad;
        $item -> unidad_medida = $this -> unidad_medida;
        $item -> concepto = $this -> concepto;
        $item -> precio_unitario = $this -> precio_unitario;
        $item -> partida_presupuestal_id = $this -> partida_presupuestal;

        array_push($this->itemSalida, $item);

        $this->reset([
            'cantidad',
            'unidad_medida',
            'concepto',
            'precio_unitario',
        ]);
        $this->partida_presupuestal = '';
        $this->dispatch('simpleAlert','Agregado correctamente','success');

        } catch (\Exception $e) {
            // dd($e->getMessage());
            $this->dispatch('simpleAlert','Hay campos vacios','error');
            $validatedData = $this->validate([
                'cantidad' => 'required|numeric',
                'unidad_medida' => 'required|string',
                'concepto' => 'required|string',
                'precio_unitario' => 'required',
                'partida_presupuestal' => 'required',
            ]);
        }
    }

    public function saveSalida() {
        try {
            // $this -> validate();
            if ( $this -> itemSalida ) {
                $this->folio = Helper::FolioGenerator(new ValeSalidaMateriales, 'folio', 5, 'SI', $this->userSedeCode);
        
                $valeSalida = ValeSalidaMateriales::create([
                    'folio' => $this -> folio,
                    'fecha' => $this -> fecha,
                    'lugar' => $this -> lugar,
                    'id_solicitante' => $this -> id_solicitante
                ]);
        
                foreach($this -> itemSalida as $item) {
                    $item_salida = new MaterialesEntregados();
                    $item_salida -> folio_vale_salida = $valeSalida -> folio;
                    $item_salida -> cantidad = $item -> cantidad;
                    $item_salida -> unidad_medida = $item -> unidad_medida;
                    $item_salida -> concepto = $item -> concepto;
                    $item_salida -> precio_unitario = $item -> precio_unitario;
                    $item_salida -> partida_presupuestal_id = $item -> partida_presupuestal_id;
                    $item_salida -> save();
                }
                // $itemsSalida = MaterialesEntregados::insert($this -> itemSalida);
                $this->dispatch('simpleAlert','Se registró la salida correctamente!','success');
                return redirect() -> route('inventario.historial');
            } else {
                $this->dispatch('simpleAlert','Hay campos vacios!','error');
            }
        } catch ( \Exception $e ) {
            
            dd($e);
        }
    }
}
