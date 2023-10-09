<?php

namespace App\Livewire\N17A\CajaMenor;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Helpers\Helper;
use stdClass;

use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;

use App\Models\CompraMenor;
use App\Models\CompraMenorList;

class CreateSale extends Component
{

    // Fields
    public $fecha;
    public $folio;
    public $solicitante;
    public $sucursal;
    public $asunto;

    public $fin_mir;
    public $proposito_mir;
    public $componente_mir;
    public $actividad_mir;

    public $cantidad;
    public $unidad_medida;
    public $concepto;
    public $p_u;
    public $importe;

    public $partida_presupuestal;

    // Table Data
    public $elementosCompraMenor = [];

    // Select Data
    public $fines_mir = [];
    public $propositos_mir = [];
    public $componetes_mir = [];
    public $actividades_mir = [];

    // Making Interactions
    public $mir2 = false;
    public $mir3 = false;
    public $mir4 = false;
    public $subtotal = 0.00;
    public $iva = 0.00;
    public $total = 0.00;

    // To Create
    public $compra_CM;
    public $item_compra;

    protected function rules() {
        return [
            'fecha'   => 'required|date',
            'folio'   => 'required|string',
            'solicitante'   => 'required|string',
            'sucursal'   => 'required|string',

            'asunto'   => 'required|string',
            'fin_mir'   => 'required',
            'proposito_mir'   => 'required',
            'componente_mir'   => 'required',
            'actividades_mir'   => 'required',
        ];
    }

    protected $messages = [
        'fecha.required' => 'Este campo es Obligatorio.',
        'fecha.date' => 'No es una fecha.',

        'folio.required' => 'Este campo es Obligatorio.',
        'folio.string' => 'Texto Invalido.',

        'solicitante.required' => 'Este campo es Obligatorio.',
        'solicitante.string' => 'Texto Invalido.',

        'sucursal.required' => 'Este campo es Obligatorio.',
        'sucursal.string' => 'Texto Invalido.',

        'asunto.required' => 'Este campo es Obligatorio.',
        'asunto.string' => 'Texto Invalido.',

        'fin_mir.required' => 'Este campo es Obligatorio.',
        'proposito_mir.required' => 'Este campo es Obligatorio.',
        'componente_mir.required' => 'Este campo es Obligatorio.',
        'actividades_mir.required' => 'Este campo es Obligatorio.',
        'partida_presupuestal.required' => 'Este campo es Obligatorio.',

        'cantidad.required' => 'Este campo es Obligatorio.',
        'cantidad.numeric' => 'No es un número.',

        'unidad_medida.required' => 'Este campo es Obligatorio.',
        'unidad_medida.string' => 'Texto Invalido.',
        'concepto.required' => 'Este campo es Obligatorio.',
        'concepto.string' => 'Texto Invalido.',

        'p_u.required' => 'Este campo es Obligatorio.',
        'p_u.string' => 'Texto Invalido.',

        'importe.required' => 'Este campo es Obligatorio.',
        'importe.string' => 'Texto Invalido.',
    ];

    public function mount()
    {
        // Default Input Data
        $this->fecha = date("Y-m-d");
        $this->folio = Helper::FolioGenerator(new CompraMenor, 'cm_folio',5,'CCM');
        $this->solicitante = auth()->user()->name;
        $this->sucursal = Helper::GetUserSede();
        $this->fin_mir = '';
        $this->proposito_mir = '';
        $this->componente_mir = '';
        $this->actividad_mir = '';
        $this->partida_presupuestal = '';

        $this->fines_mir = Plan1Fin::all();
    }

    public function render()
    {

        return view('livewire.n17-a.caja-menor.create-sale');
    }

    public function GetProposes($value){
        $this->mir2 = true;
        $this->propositos_mir = Plan2Proposito::where('plan1_fin_id', $value)->get()->toArray();
    }

    public function GetComponents($value){
        $this->mir3 = true;
        $this->componetes_mir = Plan3Componente::where('plan2_proposito_id', $value)->get()->toArray();
    }

    public function GetActivities($value){
        $this->mir4 = true;
        $this->actividades_mir = Plan4Actividad::where('plan3_componente_id', $value)->get()->toArray();
    }

    public function CalculateAmount(){
        if ($this->cantidad != "") {
            $this->cantidad = number_format($this->cantidad, 2, '.', '');
        }
        if ($this->p_u != "") {
            $this->p_u = number_format($this->p_u, 3, '.', '');
        }

        $importe = $this->cantidad * $this->p_u;

        $this->importe = number_format($importe, 2, '.', '');

    }

    public function AddToList(){

        $validatedData = $this->validate([
            'cantidad'   => 'required|numeric',
            'unidad_medida'   => 'required|string',
            'concepto'   => 'required|string',
            'p_u'   => 'required|numeric',
            'importe'   => 'required|numeric',
            'partida_presupuestal'   => 'required',
        ]);

        $item = new stdClass;
            $item->cantidad = $this->cantidad;
            $item->unidad_medida = $this->unidad_medida;
            $item->concepto = $this->concepto;
            $item->p_u = $this->p_u;
            $item->importe = $this->importe;
            $item->partida_presupuestal = $this->partida_presupuestal;

        array_push($this->elementosCompraMenor, $item);

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

    public function RemoveFromList($id){
        unset($this->elementosCompraMenor[$id]);
        $this->CalculateTotals();
        $this->dispatch('simpleAlert','Eliminado correctamente','success');
    }

    public function CalculateTotals(){
        $this->subtotal = 0;
        $items = $this->elementosCompraMenor;
        $this->elementosCompraMenor = [];

        foreach ($items as $element) {
            $this->subtotal += $element->importe;
            array_push($this->elementosCompraMenor, $element);
        }

        $this->iva = $this->subtotal * 0.16;
        $this->iva = number_format($this->iva, 2, '.', '');

        $this->total = $this->subtotal * 1.16;
        $this->total = number_format($this->total, 2, '.', '');
    }

    public function Save(){

        $this->folio = Helper::FolioGenerator(new CompraMenor, 'cm_folio', 5, 'CCM');
        $this->validate();

        $this->compra_CM = new CompraMenor();
            $this->compra_CM->cm_fecha = $this->fecha;
            $this->compra_CM->cm_folio = $this->folio;
            $this->compra_CM->solicitante_id = Auth::user()->id;
            $this->compra_CM->sucursal = $this->sucursal;
            $this->compra_CM->cm_asunto = $this->asunto;
            $this->compra_CM->mir_id_fin = $this->fin_mir;
            $this->compra_CM->mir_id_proposito = $this->proposito_mir;
            $this->compra_CM->mir_id_componente = $this->componente_mir;
            $this->compra_CM->mir_id_actividad = $this->actividad_mir;
            $this->compra_CM->cm_subtotal = $this->subtotal;
            $this->compra_CM->cm_iva = $this->iva;
            $this->compra_CM->cm_total = $this->total;
            $this->compra_CM->cm_creation_status = 'Enviado';

        $this->compra_CM->save();

        foreach ($this->elementosCompraMenor as $item) {
            $this->item_compra = new CompraMenorList();
                $this->item_compra->icm_folio = $this->folio;
                $this->item_compra->icm_cantidad = $item->cantidad;
                $this->item_compra->icm_unidad_medida = $item->unidad_medida;
                $this->item_compra->icm_concepto = $item->concepto;
                $this->item_compra->icm_partida_presupuestal = $item->partida_presupuestal;
                $this->item_compra->icm_precio_u = $item->p_u;
                $this->item_compra->icm_importe = $item->importe;
            $this->item_compra->save();
        }

        $this->reset('asunto');
        $this->fecha = date("Y-m-d");
        $this->folio = Helper::FolioGenerator(new CompraMenor, 'cm_folio',5,'CCM');
        $this->solicitante = auth()->user()->name;
        $this->sucursal = Helper::GetUserSede();
        $this->fin_mir = '';
        $this->proposito_mir = '';
        $this->componente_mir = '';
        $this->actividad_mir = '';

        $this->dispatch('alertCRUD','Exito!', 'Enviado correctamente', 'success');
        return redirect()->route('cajamenor');

    }

    public function SaveAsDraft(){

        $this->folio = Helper::FolioGenerator(new CompraMenor, 'cm_folio', 5, 'CCM');
        $this->validate();

        $this->compra_CM = new CompraMenor();
            $this->compra_CM->cm_fecha = $this->fecha;
            $this->compra_CM->cm_folio = $this->folio;
            $this->compra_CM->solicitante_id = Auth::user()->id;
            $this->compra_CM->sucursal = $this->sucursal;
            $this->compra_CM->cm_asunto = $this->asunto;
            $this->compra_CM->mir_id_fin = $this->fin_mir;
            $this->compra_CM->mir_id_proposito = $this->proposito_mir;
            $this->compra_CM->mir_id_componente = $this->componente_mir;
            $this->compra_CM->mir_id_actividad = $this->actividad_mir;
            $this->compra_CM->cm_subtotal = $this->subtotal;
            $this->compra_CM->cm_iva = $this->iva;
            $this->compra_CM->cm_total = $this->total;
            $this->compra_CM->cm_creation_status = 'Borrador';

        $this->compra_CM->save();

        foreach ($this->elementosCompraMenor as $item) {
            $this->item_compra = new CompraMenorList();
                $this->item_compra->icm_folio = $this->folio;
                $this->item_compra->icm_cantidad = $item->cantidad;
                $this->item_compra->icm_unidad_medida = $item->unidad_medida;
                $this->item_compra->icm_concepto = $item->concepto;
                $this->item_compra->icm_partida_presupuestal = $item->partida_presupuestal;
                $this->item_compra->icm_precio_u = $item->p_u;
                $this->item_compra->icm_importe = $item->importe;
            $this->item_compra->save();
        }

        $this->reset('asunto');
        $this->fecha = date("Y-m-d");
        $this->folio = Helper::FolioGenerator(new CompraMenor, 'cm_folio',5,'CCM');
        $this->solicitante = auth()->user()->name;
        $this->sucursal = Helper::GetUserSede();
        $this->fin_mir = '';
        $this->proposito_mir = '';
        $this->componente_mir = '';
        $this->actividad_mir = '';

        $this->dispatch('alertCRUD','Exito!', 'Guardado correctamente', 'success');
        return redirect()->route('cajamenor');

    }

}
