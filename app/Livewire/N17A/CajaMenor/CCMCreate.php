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

use App\Models\PptoDeEgreso;

use App\Models\User;
use App\Models\CompraMenor;
use App\Models\CompraMenorList;

class CCMCreate extends Component
{

    // Edit Class
    public $edit_to_folio = '';
    public $compra_to_edit;

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
    public $partidas_presupuestales = [];

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
    public $is_editing = false;

    public $userSede;
    public $specificUserSede;

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
            'actividad_mir'   => 'required',
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
        'actividad_mir.required' => 'Este campo es Obligatorio.',
        'partida_presupuestal.required' => 'Este campo es Obligatorio.',

        'cantidad.required' => 'Este campo es Obligatorio.',
        'cantidad.numeric' => 'No es un nÃºmero.',

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

        if ($this->edit_to_folio == '') {

            $this->userSede = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->SedeNombre;

            $this->fecha = date("Y-m-d");
            $this->folio = "MPEO-CM-00000";
            $this->solicitante = auth()->user()->name;
            $this->sucursal = $this->userSede;
            $this->fin_mir = '';
            $this->proposito_mir = '';
            $this->componente_mir = '';
            $this->actividad_mir = '';
        } else {
            // Search CompraMenor
            $this->compra_to_edit = CompraMenor::where('cm_folio',$this->edit_to_folio)->first();

            // Get item list
            $all_items = CompraMenorList::where('icm_folio', $this->edit_to_folio)->get();

            foreach ($all_items as $item_list) {
                $item = new stdClass;
                    $item->icm_cantidad = $item_list->icm_cantidad;
                    $item->icm_unidad_medida = $item_list->icm_unidad_medida;
                    $item->icm_concepto = $item_list->icm_concepto;
                    $item->icm_precio_u = $item_list->icm_precio_u;
                    $item->icm_importe = $item_list->icm_importe;
                    $item->icm_partida_presupuestal = $item_list->icm_partida_presupuestal;

                array_push($this->elementosCompraMenor, $item);
            }

            // Activate Editing Action
            $this->is_editing = true;

            // Search User Data by ID
            $get_user = User::where('id',$this->compra_to_edit->solicitante_id)->first();
            $this->solicitante = $get_user->name;

            $this->specificUserSede = $this->sucursal =is_string(Helper::GetSpecificUserSede($get_user)) ? Helper::GetSpecificUserSede($get_user) : Helper::GetSpecificUserSede($get_user)->SedeNombre;

            $this->sucursal = $this->specificUserSede;

            // Values that can be set here
            $this->fecha = $this->compra_to_edit->cm_fecha;
            $this->folio = $this->compra_to_edit->cm_folio;
            $this->asunto = $this->compra_to_edit->cm_asunto;

            $this->subtotal = number_format($this->compra_to_edit->cm_subtotal, 2, '.', '');
            $this->iva = number_format($this->compra_to_edit->cm_iva, 2, '.', '');
            $this->total = number_format($this->compra_to_edit->cm_total, 2, '.', '');

            $this->fin_mir = $this->compra_to_edit->mir_id_fin;
            $this->GetProposes($this->fin_mir);
            $this->proposito_mir = $this->compra_to_edit->mir_id_proposito;
            $this->GetComponents($this->proposito_mir);
            $this->componente_mir = $this->compra_to_edit->mir_id_componente;
            $this->GetActivities($this->componente_mir);
            $this->actividad_mir = $this->compra_to_edit->mir_id_actividad;

        }

        $this->partida_presupuestal = '';
        $this->partidas_presupuestales = PptoDeEgreso::all();
        $this->fines_mir = Plan1Fin::all();
    }

    public function render()
    {
        return view('livewire.n17-a.caja-menor.c-c-m-create');
    }

    // Forge MIR
    public function GetProposes($value){
        $this->mir2 = true;
        $this->propositos_mir = Plan2Proposito::where('plan1_fin_id', $value)->get()->toArray();
        $this->mir3 = false;
        $this->mir4 = false;
        $this->proposito_mir = '';
        $this->componente_mir = '';
        $this->actividad_mir = '';
    }

    public function GetComponents($value){
        $this->mir3 = true;
        $this->componetes_mir = Plan3Componente::where('plan2_proposito_id', $value)->get()->toArray();
        $this->mir4 = false;
        $this->componente_mir = '';
        $this->actividad_mir = '';
    }

    public function GetActivities($value){
        $this->mir4 = true;
        $this->actividades_mir = Plan4Actividad::where('plan3_componente_id', $value)->get()->toArray();
        $this->actividad_mir = '';
    }

    // Table Interactions
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
            $item->icm_cantidad = $this->cantidad;
            $item->icm_unidad_medida = $this->unidad_medida;
            $item->icm_concepto = $this->concepto;
            $item->icm_precio_u = $this->p_u;
            $item->icm_importe = $this->importe;
            $item->icm_partida_presupuestal = $this->partida_presupuestal;

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

    // Get Totals
    public function CalculateTotals(){
        $this->subtotal = 0;
        $items = $this->elementosCompraMenor;
        $this->elementosCompraMenor = [];

        foreach ($items as $element) {
            $this->subtotal += $element->icm_importe;
            array_push($this->elementosCompraMenor, $element);
        }

        $this->iva = $this->subtotal * 0.16;
        $this->iva = number_format($this->iva, 2, '.', '');

        $this->total = $this->subtotal * 1.16;
        $this->total = number_format($this->total, 2, '.', '');
    }

    // Ways of Save
    public function Save(){

        if(!$this->is_editing){

            $this->folio = Helper::FolioGenerator(new CompraMenor, 'cm_folio', 5, 'CM', $this->userSede);

            $this->validate();

            $this->compra_CM = new CompraMenor();
                $this->compra_CM->cm_fecha = $this->fecha;
                $this->compra_CM->cm_folio = $this->folio;
                $this->compra_CM->solicitante_id = Auth::user()->id;
                $this->compra_CM->sucursal = $this->sucursal;
                $this->compra_CM->cm_asunto = $this->asunto;
                $this->compra_CM->mir_id_fin = $this->fin_mir; $this->fin_mir;
                $this->compra_CM->mir_id_proposito = $this->proposito_mir;
                $this->compra_CM->mir_id_componente = $this->componente_mir;
                $this->compra_CM->mir_id_actividad =  $this->actividad_mir;
                $this->compra_CM->cm_subtotal = $this->subtotal;
                $this->compra_CM->cm_iva = $this->iva;
                $this->compra_CM->cm_total = $this->total;
                $this->compra_CM->cm_creation_status = 'Enviado';

            $this->compra_CM->save();

            foreach ($this->elementosCompraMenor as $item) {
                $this->item_compra = new CompraMenorList();
                    $this->item_compra->icm_folio = $this->folio;
                    $this->item_compra->icm_cantidad = $item->icm_cantidad;
                    $this->item_compra->icm_unidad_medida = $item->icm_unidad_medida;
                    $this->item_compra->icm_concepto = $item->icm_concepto;
                    $this->item_compra->icm_partida_presupuestal = $item->icm_partida_presupuestal;
                    $this->item_compra->icm_precio_u = $item->icm_precio_u;
                    $this->item_compra->icm_importe = $item->icm_importe;
                $this->item_compra->save();
            }

            $this->dispatch('alertCRUD','Exito!', 'Enviado correctamente', 'success');
        } else{

            $this->validate();

            // Search CompraMenor
            $this->compra_CM = CompraMenor::where('cm_folio',$this->edit_to_folio)->first();
            // Get item list
            $all_items = CompraMenorList::where('icm_folio', $this->edit_to_folio)->get();

            foreach ($all_items as $item_list) {
                $item_list->delete();
            }

            if ($this->compra_CM->cm_creation_status == 'Enviado') {
                $this->compra_CM->cm_folio = $this->folio;
            } else {
                if (str_starts_with($this->compra_CM->cm_folio, '&')) {
                    $this->compra_CM->cm_folio = Helper::FolioGenerator(new CompraMenor, 'cm_folio', 5, 'CM', $this->specificUserSede);
                }else{
                    $this->compra_CM->cm_folio = $this->folio;
                }
            }

            $this->compra_CM->cm_asunto = $this->asunto;
            $this->compra_CM->mir_id_fin = $this->fin_mir; $this->fin_mir;
            $this->compra_CM->mir_id_proposito = $this->proposito_mir;
            $this->compra_CM->mir_id_componente = $this->componente_mir;
            $this->compra_CM->mir_id_actividad =  $this->actividad_mir;
            $this->compra_CM->cm_subtotal = $this->subtotal;
            $this->compra_CM->cm_iva = $this->iva;
            $this->compra_CM->cm_total = $this->total;
            $this->compra_CM->cm_creation_status = 'Enviado';

            $this->compra_CM->save();

            foreach ($this->elementosCompraMenor as $item) {
                $this->item_compra = new CompraMenorList();
                    $this->item_compra->icm_folio = $this->compra_CM->cm_folio;
                    $this->item_compra->icm_cantidad = $item->icm_cantidad;
                    $this->item_compra->icm_unidad_medida = $item->icm_unidad_medida;
                    $this->item_compra->icm_concepto = $item->icm_concepto;
                    $this->item_compra->icm_partida_presupuestal = $item->icm_partida_presupuestal;
                    $this->item_compra->icm_precio_u = $item->icm_precio_u;
                    $this->item_compra->icm_importe = $item->icm_importe;
                $this->item_compra->save();
            }

            $this->dispatch('alertCRUD','Exito!', 'Actualizado correctamente', 'success');
        }

        $this->reset('asunto');
        $this->fecha = date("Y-m-d");
        $this->folio = 'MPEO-CM-00000';
        $this->solicitante = auth()->user()->name;
        $this->sucursal = $this->userSede;
        $this->fin_mir = '';
        $this->proposito_mir = '';
        $this->componente_mir = '';
        $this->actividad_mir = '';
        return redirect()->route('cajamenor');

    }

    public function SaveAsDraft(){

        if (!$this->is_editing) {

            $this->folio = Helper::FakeFolioGenerator(5,'DRAFT');
            $this->validate();

            $this->compra_CM = new CompraMenor();
                $this->compra_CM->cm_fecha = $this->fecha;
                $this->compra_CM->cm_folio = $this->folio;
                $this->compra_CM->solicitante_id = Auth::user()->id;
                $this->compra_CM->sucursal = $this->sucursal;
                $this->compra_CM->cm_asunto = $this->asunto;
                $this->compra_CM->mir_id_fin = $this->fin_mir; $this->fin_mir;
                $this->compra_CM->mir_id_proposito = $this->proposito_mir;
                $this->compra_CM->mir_id_componente = $this->componente_mir;
                $this->compra_CM->mir_id_actividad =  $this->actividad_mir;
                $this->compra_CM->cm_subtotal = $this->subtotal;
                $this->compra_CM->cm_iva = $this->iva;
                $this->compra_CM->cm_total = $this->total;
                $this->compra_CM->cm_creation_status = 'Borrador';

            $this->compra_CM->save();

            foreach ($this->elementosCompraMenor as $item) {
                $this->item_compra = new CompraMenorList();
                    $this->item_compra->icm_folio = $this->folio;
                    $this->item_compra->icm_cantidad = $item->icm_cantidad;
                    $this->item_compra->icm_unidad_medida = $item->icm_unidad_medida;
                    $this->item_compra->icm_concepto = $item->icm_concepto;
                    $this->item_compra->icm_partida_presupuestal = $item->icm_partida_presupuestal;
                    $this->item_compra->icm_precio_u = $item->icm_precio_u;
                    $this->item_compra->icm_importe = $item->icm_importe;
                $this->item_compra->save();
            }

            $this->dispatch('alertCRUD','Exito!', 'Guardado correctamente', 'success');
        } else {

            $this->validate();

            // Search CompraMenor
            $this->compra_CM = CompraMenor::where('cm_folio',$this->edit_to_folio)->first();
            // Get item list
            $all_items = CompraMenorList::where('icm_folio', $this->edit_to_folio)->get();

            foreach ($all_items as $item_list) {
                $item_list->delete();
            }

            $this->compra_CM->cm_folio = $this->folio;
            $this->compra_CM->cm_asunto = $this->asunto;
            $this->compra_CM->mir_id_fin = $this->fin_mir; $this->fin_mir;
            $this->compra_CM->mir_id_proposito = $this->proposito_mir;
            $this->compra_CM->mir_id_componente = $this->componente_mir;
            $this->compra_CM->mir_id_actividad =  $this->actividad_mir;
            $this->compra_CM->cm_subtotal = $this->subtotal;
            $this->compra_CM->cm_iva = $this->iva;
            $this->compra_CM->cm_total = $this->total;
            $this->compra_CM->cm_creation_status = 'Borrador';

            $this->compra_CM->save();

            foreach ($this->elementosCompraMenor as $item) {
                $this->item_compra = new CompraMenorList();
                    $this->item_compra->icm_folio = $this->folio;
                    $this->item_compra->icm_cantidad = $item->icm_cantidad;
                    $this->item_compra->icm_unidad_medida = $item->icm_unidad_medida;
                    $this->item_compra->icm_concepto = $item->icm_concepto;
                    $this->item_compra->icm_partida_presupuestal = $item->icm_partida_presupuestal;
                    $this->item_compra->icm_precio_u = $item->icm_precio_u;
                    $this->item_compra->icm_importe = $item->icm_importe;
                $this->item_compra->save();
            }

            $this->dispatch('alertCRUD','Exito!', 'Actualizado correctamente', 'success');
        }

        $this->reset('asunto');
        $this->fecha = date("Y-m-d");
        $this->folio = 'MPEO-CM-00000';
        $this->solicitante = auth()->user()->name;
        $this->sucursal = $this->userSede;
        $this->fin_mir = '';
        $this->proposito_mir = '';
        $this->componente_mir = '';
        $this->actividad_mir = '';
        return redirect()->route('cajamenor');
    }

}
