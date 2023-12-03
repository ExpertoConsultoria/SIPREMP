<?php

namespace App\Livewire\Shared\Solicitud;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper;
use stdClass;

use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;

use App\Models\User;
use App\Models\Archivos;
use App\Models\Memorandum;
use App\Models\MemorandumList;
use App\Models\PptoDeEgreso;


class SolicitudesCreate extends Component
{
    // Edit Class
    public $edit_to_folio = '';
    public $memo_to_edit;
    public $quote;

    // Fields
    public $fecha;
    public $folio;
    public $solicitante;

    public $sucursal;
    public $destinatario;

    public $asunto;

    public $fin_mir;
    public $proposito_mir;
    public $componente_mir;
    public $actividad_mir;
    public $cotizacion;

    public $cantidad;
    public $unidad_medida;
    public $concepto;
    public $p_u;
    public $importe;

    public $partida_presupuestal;

    // Table Data
    public $elementosMemorandum = [];

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

    public $is_quote = false;

    // To Create
    public $memorandum;
    public $memorandum_item;
    public $is_editing = false;

    public $userSede;
    public $userSedeCode;
    public $specificUserSede;
    public $specificUserSedeCode;

    // Redireccionamiento
    public $redirecTo;
    public $backButton;

    protected function rules() {
        return [
            'fecha' => 'required|date',
            'folio' => 'required|string',
            'solicitante' => 'required|string',

            'sucursal' => 'required',
            'destinatario' => 'required',

            'asunto'   => 'required|string',
            'cotizacion'   => 'required',
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
        'destinatario.required' => 'Este campo es Obligatorio.',

        'asunto.required' => 'Este campo es Obligatorio.',
        'asunto.string' => 'Texto Invalido.',

        'fin_mir.required' => 'Este campo es Obligatorio.',
        'cotizacion.required' => 'Cotización Obligatoria.',
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

    protected $listeners = ['AssignQuotation'];

    public function render()
    {
        $this->backButton = Helper::backButton();
        return view('livewire.shared.solicitud.solicitudes-create');
    }

    public function mount() {
        if ($this->edit_to_folio == '') {

            $this->userSede = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->SedeNombre;
            $this->userSedeCode = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->Serie;

            $this->fecha = date("Y-m-d");
            $this->folio = "MPEO-MM-00000";
            $this->solicitante = auth()->user()->name;
            $this->sucursal = $this->userSede;
            $this->destinatario = '';
            $this->cotizacion = null;
            $this->fin_mir = '';
            $this->proposito_mir = '';
            $this->componente_mir = '';
            $this->actividad_mir = '';
        } else {
            // Search CompraMenor
            $this->memo_to_edit = Memorandum::where('memo_folio', $this->edit_to_folio)->first();

            // Get item list
            $all_items = MemorandumList::where('im_folio', $this->edit_to_folio)->get();

            foreach ($all_items as $item_list) {
                $item = new stdClass;
                $item->im_cantidad = $item_list->im_cantidad;
                $item->im_unidad_medida = $item_list->im_unidad_medida;
                $item->im_concepto = $item_list->im_concepto;
                $item->im_precio_u = $item_list->im_precio_u;
                $item->im_importe = $item_list->im_importe;
                $item->im_partida_presupuestal = $item_list->im_partida_presupuestal;

                array_push($this->elementosMemorandum, $item);
            }

            $this->CalculateTotals();

            // Activate Editing Action
            $this->is_editing = true;

            // Search User Data by ID
            $get_user = User::where('id',$this->memo_to_edit->solicitante_id)->first();
            $this->solicitante = $get_user->name;

            $this->specificUserSede = $this->sucursal = is_string(Helper::GetSpecificUserSede($get_user)) ? Helper::GetSpecificUserSede($get_user) : Helper::GetSpecificUserSede($get_user)->SedeNombre;
            $this->specificUserSedeCode = $this->sucursal = is_string(Helper::GetSpecificUserSede($get_user)) ? Helper::GetSpecificUserSede($get_user) : Helper::GetSpecificUserSede($get_user)->Serie;
            $this->sucursal = $this->specificUserSede;

            $this->sucursal = Helper::GetSpecificUserSede($get_user)->SedeNombre;
            $this->destinatario = $this->memo_to_edit->destinatario;
            $this->cotizacion = $this->memo_to_edit->memo_id_cotizacion;

            if($this->cotizacion != null){
                $this->is_quote = true;
            }

            // Values that can be set here
            $this->fecha = $this->memo_to_edit->memo_fecha;
            $this->folio = $this->memo_to_edit->memo_folio;
            $this->asunto = $this->memo_to_edit->memo_asunto;

            $this->subtotal = number_format($this->memo_to_edit->memo_subtotal, 2, '.', '');
            $this->iva = number_format($this->memo_to_edit->memo_iva, 2, '.', '');
            $this->total = number_format($this->memo_to_edit->memo_total, 2, '.', '');

            $this->fin_mir = $this->memo_to_edit->mir_id_fin;
            $this->GetProposes($this->fin_mir);
            $this->proposito_mir = $this->memo_to_edit->mir_id_proposito;
            $this->GetComponents($this->proposito_mir);
            $this->componente_mir = $this->memo_to_edit->mir_id_componente;
            $this->GetActivities($this->componente_mir);
            $this->actividad_mir = $this->memo_to_edit->mir_id_actividad;

        }

        $this->partida_presupuestal = '';
        $this->partidas_presupuestales = PptoDeEgreso::all();
        $this->fines_mir = Plan1Fin::all();
    }

    // MIR
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
        if (is_numeric($this->cantidad) && is_numeric($this->p_u)) {
            $cantidad = floatval($this->cantidad);
            $p_u = floatval($this->p_u);

            $importe = $cantidad * $p_u;

            $this->importe = number_format($importe, 2, '.', '');
        } else {
            $this->importe = 0;
        }
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
            $item->im_cantidad = $this->cantidad;
            $item->im_unidad_medida = $this->unidad_medida;
            $item->im_concepto = $this->concepto;
            $item->im_precio_u = $this->p_u;
            $item->im_importe = $this->importe;
            $item->im_partida_presupuestal = $this->partida_presupuestal;

        array_push($this->elementosMemorandum, $item);

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
        unset($this->elementosMemorandum[$id]);
        $this->CalculateTotals();
        $this->dispatch('simpleAlert','Eliminado correctamente','success');
    }

    // Cotizaciones
    public function AssignQuotation($quote_id){
        $this->cotizacion = $quote_id;
        $this->is_quote = true;

        $this->dispatch('closeModal');
        $this->dispatch('simpleAlert', 'Asigando correctamente', 'success');
    }

    public function DeleteQuotation(){
        $this->quote = Archivos::find($this->cotizacion);
            File::delete($this->quote->arch_ruta);
            $this->quote->delete();

        $this->is_quote = false;
        $this->cotizacion = null;

        $this->dispatch('simpleAlert', 'Eliminado correctamente', 'success');
    }

    // Get Totals
    public function CalculateTotals() {
        $this->subtotal = 0;
        $items = $this->elementosMemorandum;
        $this->elementosMemorandum = [];

        foreach ($items as $element) {
            $this->subtotal += $element->im_importe;
            array_push($this->elementosMemorandum, $element);
        }

        $this->iva = $this->subtotal * 0.16;
        $this->iva = number_format($this->iva, 2, '.', '');

        $this->total = $this->subtotal * 1.16;
        $this->total = number_format($this->total, 2, '.', '');
    }

    public function Save(){

        if($this->total > 10000 ){
            $this->dispatch('alertCRUD', 'Error!', 'Ha excedido el monto limite ($10,000) para una Compra Extraordinaria', 'error');
            return;
        }

        // Validamos Todos los Campos
        $this->validate();

        if(!$this->is_editing) {
            if(count($this->elementosMemorandum)){
                $this->folio = Helper::FolioGenerator(new Memorandum, 'memo_folio', 5, 'MM', $this->userSedeCode);

                $this->memorandum = new Memorandum();
                $this->memorandum->memo_fecha = $this->fecha;
                $this->memorandum->memo_folio = $this->folio;
                $this->memorandum->solicitante_id = Auth::user()->id;
                $this->memorandum->memo_sucursal = $this->sucursal;
                $this->memorandum->destinatario = $this->destinatario;
                $this->memorandum->memo_id_cotizacion = $this->cotizacion;
                $this->memorandum->memo_asunto = $this->asunto;
                $this->memorandum->mir_id_fin = $this->fin_mir; $this->fin_mir;
                $this->memorandum->mir_id_proposito = $this->proposito_mir;
                $this->memorandum->mir_id_componente = $this->componente_mir;
                $this->memorandum->mir_id_actividad =  $this->actividad_mir;

                if(Auth::user()->roles[0]->name === 'N5:18A:F' || Auth::user()->roles[0]->name === 'N6:17A'){
                    $this->memorandum->memo_creation_status = 'Validado';
                    $this->memorandum->pass_filter = 1;
                }else{
                    $this->memorandum->memo_creation_status = 'Enviado';
                }

                $this->memorandum->save();

                foreach ($this->elementosMemorandum as $item) {
                    $this->memorandum_item = new MemorandumList();
                    $this->memorandum_item->im_folio = $this->folio;
                    $this->memorandum_item->im_cantidad = $item->im_cantidad;
                    $this->memorandum_item->im_unidad_medida = $item->im_unidad_medida;
                    $this->memorandum_item->im_concepto = $item->im_concepto;
                    $this->memorandum_item->im_partida_presupuestal = $item->im_partida_presupuestal;
                    $this->memorandum_item->im_precio_u = $item->im_precio_u;
                    $this->memorandum_item->im_importe = $item->im_importe;
                    $this->memorandum_item->save();
                }

                $this->dispatch('alertCRUD','Exito!', 'Enviado correctamente', 'success');
                return redirect()->route($this->redirectTo());
            } else {
                $this->dispatch('alertCRUD', 'Error!', 'No se puede generar una solicitud sin elementos de compra', 'error');
                return;
            }
        } else {
            if ( count($this->elementosMemorandum ) ) {

                // Search CompraMenor
                $this->memorandum = Memorandum::where('memo_folio',$this->edit_to_folio)->first();
                // Get item list
                $all_items = MemorandumList::where('im_folio', $this->edit_to_folio)->get();

                foreach ($all_items as $item_list) {
                    $item_list->delete();
                }

                if ($this->memorandum->memo_creation_status == 'Enviado') {
                    $this->memorandum->memo_folio = $this->folio;
                } else {
                    if (str_starts_with($this->memorandum->memo_folio, '&')) {
                        $this->memorandum->memo_folio = Helper::FolioGenerator(new Memorandum, 'memo_folio', 5, 'MM', $this->specificUserSedeCode);
                    }else{
                        $this->memorandum->memo_folio = $this->folio;
                    }
                }

                $this->memorandum->memo_asunto = $this->asunto;
                $this->memorandum->mir_id_fin = $this->fin_mir; $this->fin_mir;
                $this->memorandum->mir_id_proposito = $this->proposito_mir;
                $this->memorandum->mir_id_componente = $this->componente_mir;
                $this->memorandum->mir_id_actividad =  $this->actividad_mir;
                $this->memorandum->memo_sucursal = $this->sucursal;
                $this->memorandum->destinatario = $this->destinatario;
                $this->memorandum->memo_id_cotizacion = $this->cotizacion;
                if(Auth::user()->roles[0]->name === 'N5:18A:F' || Auth::user()->roles[0]->name === 'N6:17A'){
                    $this->memorandum->memo_creation_status = 'Validado';
                    $this->memorandum->pass_filter = 1;
                }else{
                    $this->memorandum->memo_creation_status = 'Enviado';
                }

                $this->memorandum->save();

                foreach ($this->elementosMemorandum as $item) {
                    $this->memorandum_item = new MemorandumList();
                    $this->memorandum_item->im_folio = $this->memorandum->memo_folio;
                    $this->memorandum_item->im_cantidad = $item->im_cantidad;
                    $this->memorandum_item->im_unidad_medida = $item->im_unidad_medida;
                    $this->memorandum_item->im_concepto = $item->im_concepto;
                    $this->memorandum_item->im_partida_presupuestal = $item->im_partida_presupuestal;
                    $this->memorandum_item->im_precio_u = $item->im_precio_u;
                    $this->memorandum_item->im_importe = $item->im_importe;
                    $this->memorandum_item->save();
                }

                $this->dispatch('alertCRUD','Exito!', 'Actualizado correctamente', 'success');
                $this->reset('asunto');
                $this->fecha = date("Y-m-d");
                $this->folio = 'MPEO-MM-00000';
                $this->solicitante = auth()->user()->name;
                $this->sucursal = $this->userSede;
                $this->fin_mir = '';
                $this->proposito_mir = '';
                $this->componente_mir = '';
                $this->actividad_mir = '';
                $this->destinatario = '';
                $this->cotizacion = null;
                return redirect()->route($this->redirectTo());
            } else {
                $this->dispatch('alertCRUD', 'Error!', 'No se puede generar una solicitud sin elementos de compra', 'error');
                return;
            }

        }

    }

    // Ways of Save
    public function SaveAsDraft(){

        $validatedData = $this->validate([
            'asunto'   => 'required|string',
        ]);

        if (!$this->is_editing) {

            $this->folio = Helper::FakeFolioGenerator(5,'DRAFT');

            $this->memorandum = new Memorandum();
                $this->memorandum->memo_fecha = $this->fecha;
                $this->memorandum->memo_folio = $this->folio;
                $this->memorandum->solicitante_id = Auth::user()->id;
                $this->memorandum->memo_sucursal = $this->sucursal;
                $this->memorandum->destinatario = $this->destinatario;
                $this->memorandum->memo_id_cotizacion = $this->cotizacion;
                $this->memorandum->memo_asunto = $this->asunto;
                $this->memorandum->mir_id_fin = $this->fin_mir; $this->fin_mir;
                $this->memorandum->mir_id_proposito = $this->proposito_mir;
                $this->memorandum->mir_id_componente = $this->componente_mir;
                $this->memorandum->mir_id_actividad =  $this->actividad_mir;
                $this->memorandum->memo_creation_status = 'Borrador';

            $this->memorandum->save();

            foreach ($this->elementosMemorandum as $item) {
                $this->memorandum_item = new MemorandumList();
                $this->memorandum_item->im_folio = $this->folio;
                $this->memorandum_item->im_cantidad = $item->im_cantidad;
                $this->memorandum_item->im_unidad_medida = $item->im_unidad_medida;
                $this->memorandum_item->im_concepto = $item->im_concepto;
                $this->memorandum_item->im_partida_presupuestal = $item->im_partida_presupuestal;
                $this->memorandum_item->im_precio_u = $item->im_precio_u;
                $this->memorandum_item->im_importe = $item->im_importe;
                $this->memorandum_item->save();
            }

            $this->dispatch('alertCRUD','Exito!', 'Guardado correctamente', 'success');
        } else {

            // Search Memorandum
            $this->memorandum = Memorandum::where('memo_folio',$this->edit_to_folio)->first();
            // Get item list
            $all_items = MemorandumList::where('im_folio', $this->edit_to_folio)->get();

            foreach ($all_items as $item_list) {
                $item_list->delete();
            }

            $this->memorandum->memo_asunto = $this->asunto;
            $this->memorandum->mir_id_fin = $this->fin_mir; $this->fin_mir;
            $this->memorandum->mir_id_proposito = $this->proposito_mir;
            $this->memorandum->mir_id_componente = $this->componente_mir;
            $this->memorandum->mir_id_actividad =  $this->actividad_mir;
            $this->memorandum->memo_sucursal = $this->sucursal;
            $this->memorandum->destinatario = $this->destinatario;
            $this->memorandum->memo_id_cotizacion = $this->cotizacion;
            $this->memorandum->memo_creation_status = 'Borrador';

            $this->memorandum->save();

            foreach ($this->elementosMemorandum as $item) {
                $this->memorandum_item = new MemorandumList();
                $this->memorandum_item->im_folio = $this->folio;
                $this->memorandum_item->im_cantidad = $item->im_cantidad;
                $this->memorandum_item->im_unidad_medida = $item->im_unidad_medida;
                $this->memorandum_item->im_concepto = $item->im_concepto;
                $this->memorandum_item->im_partida_presupuestal = $item->im_partida_presupuestal;
                $this->memorandum_item->im_precio_u = $item->im_precio_u;
                $this->memorandum_item->im_importe = $item->im_importe;
                $this->memorandum_item->save();
            }

            $this->dispatch('alertCRUD','Exito!', 'Actualizado correctamente', 'success');
        }

        $this->reset('asunto');
        $this->fecha = date("Y-m-d");
        $this->folio = 'MPEO-MM-00000';
        $this->solicitante = auth()->user()->name;
        $this->sucursal = $this->userSede;
        $this->fin_mir = '';
        $this->proposito_mir = '';
        $this->componente_mir = '';
        $this->actividad_mir = '';
        $this->destinatario = '';
        $this->cotizacion = null;
        return redirect()->route($this->redirectTo());
    }

    public function redirectTo() {
        $user = Auth::user()->roles[0]->name;
        if ( $user === 'N6:17A' ) {
            return 'dashboard';
        } elseif ( $user === 'N7:GS:17A' || $user === 'admin' || $user === 'N5:18A:F' ) {
            return 'solicitudes';
        }
    }

}

