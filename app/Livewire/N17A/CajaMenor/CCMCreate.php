<?php

//ToDo https://github.com/phpcfdi/cfdi-to-json#convirtiendo-de-domdocument-a-array

namespace App\Livewire\N17A\CajaMenor;

use App\Helpers\Helper;
use App\Models\CompraMenor;
use App\Models\CompraMenorList;
use App\Models\FacturaCM;
use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;
use App\Models\PptoDeEgreso;
use App\Models\Empresa;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use PhpCfdi\CfdiToJson\JsonConverter;
use Livewire\WithFileUploads;
use Livewire\Component;

use stdClass;

class CCMCreate extends Component
{
    use WithFileUploads;

    // Edit Class
    public $edit_to_folio = '';
    public $compra_to_edit;
    public $add_xml;

    // Fields
    public $fecha;
    public $folio;
    public $solicitante;
    public $sucursal;
    public $asunto;

    public $factura_id;
    public $empresa_id;

    public $fin_mir;
    public $proposito_mir;
    public $componente_mir;
    public $actividad_mir;

    // public $cantidad;
    // public $unidad_medida;
    // public $concepto;
    // public $p_u;
    // public $importe;

    public $partida_presupuestal;

    // Table Data
        public $elementosCompraMenor = [];

        public $razon_social;
        public $RFC;
        public $telefono;

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
        public $userSedeCode;
        public $specificUserSede;
        public $specificUserSedeCode;

    protected function rules()
    {
        return [
            'fecha' => 'required|date',
            'folio' => 'required|string',
            'solicitante' => 'required|string',
            'sucursal' => 'required|string',

            'factura_id' => 'required',

            'asunto' => 'required|string',
            'fin_mir' => 'required',
            'proposito_mir' => 'required',
            'componente_mir' => 'required',
            'actividad_mir' => 'required',
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

        'factura_id.required' => 'No has adjuntado ninguna Factura.',
    ];

    protected $listeners = ['loadDataXML','setPartidaP'];

    public function mount()
    {
        // Default Input Data

        if ($this->edit_to_folio == '') {

            $this->userSede = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->SedeNombre;
            $this->userSedeCode = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->Serie;

            $this->fecha = date("Y-m-d");
            $this->folio = "MPEO-CM-00000";
            $this->solicitante = auth()->user()->name;
            $this->sucursal = $this->userSede;
            $this->fin_mir = '';
            $this->proposito_mir = '';
            $this->componente_mir = '';
            $this->actividad_mir = '';

            $this->razon_social = "-- -- --";
            $this->RFC = "-- -- --";
            $this->telefono  = "-- -- --";

            $this->add_xml  = true;

        } else {
            // Search CompraMenor
            $this->compra_to_edit = CompraMenor::where('cm_folio', $this->edit_to_folio)->first();

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
            $get_user = User::where('id', $this->compra_to_edit->solicitante_id)->first();
            $this->solicitante = $get_user->name;

            $this->specificUserSede = $this->sucursal = is_string(Helper::GetSpecificUserSede($get_user)) ? Helper::GetSpecificUserSede($get_user) : Helper::GetSpecificUserSede($get_user)->SedeNombre;
            $this->specificUserSedeCode = $this->sucursal = is_string(Helper::GetSpecificUserSede($get_user)) ? Helper::GetSpecificUserSede($get_user) : Helper::GetSpecificUserSede($get_user)->Serie;

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

            if ($this->compra_to_edit->empresa_id != null) {
                $this->empresa_id = $this->compra_to_edit->empresa_id;
                $empresa = Empresa::findOrFail($this->empresa_id);

                $this->razon_social = $empresa->RazonSocial;
                $this->RFC = $empresa->RFC;
                $this->telefono  = $empresa?->Telefono ? $empresa->Telefono : 'Ninguno';
            }

            if ($this->compra_to_edit->factura_cm_id == null) {
                $this->add_xml  = true;
            }else{
                $this->factura_id = $this->compra_to_edit->factura_cm_id;
                $this->add_xml  = false;
            }
        }

        $this->partida_presupuestal = '';
        $this->fines_mir = Plan1Fin::all();
        $this->partidas_presupuestales = PptoDeEgreso::all();
    }

    public function render()
    {
        return view('livewire.n17-a.caja-menor.c-c-m-create');
    }

    // Forge MIR
    public function GetProposes($value)
    {
        $this->mir2 = true;
        $this->propositos_mir = Plan2Proposito::where('plan1_fin_id', $value)->get()->toArray();
        $this->mir3 = false;
        $this->mir4 = false;
        $this->proposito_mir = '';
        $this->componente_mir = '';
        $this->actividad_mir = '';
    }

    public function GetComponents($value)
    {
        $this->mir3 = true;
        $this->componetes_mir = Plan3Componente::where('plan2_proposito_id', $value)->get()->toArray();
        $this->mir4 = false;
        $this->componente_mir = '';
        $this->actividad_mir = '';
    }

    public function GetActivities($value)
    {
        $this->mir4 = true;
        $this->actividades_mir = Plan4Actividad::where('plan3_componente_id', $value)->get()->toArray();
        $this->actividad_mir = '';
    }

    // Table Interactions

    public function loadDataXML($xml_id)
    {

        $this->dispatch('simpleAlert','Archivo Cargado Correctamente','success');

        // Obtenemos la factura registrada y extraemos su infromacion
        $factura = FacturaCM::findOrFail($xml_id);

        $factura_contents = file_get_contents($factura->fcm_xml_ruta);
        $factura_json = JsonConverter::convertToJson($factura_contents);
        $factura_json = json_decode($factura_json, true);

        //Comprobamos si RFC del proveedor ya existe en la base de datos, de lo contrario creamos el registro
        $empresaData = Empresa::where('RFC', '=', $factura_json['Emisor']['Rfc'])->first();
        if(empty($empresaData))
        {
            $empresa = new Empresa();
            $empresa->RFC = $factura_json['Emisor']['Rfc'];
            $empresa->RazonSocial = str_replace("'","`",$factura_json['Emisor']['Nombre']);
            $empresa->Regimen = $factura_json['Emisor']['RegimenFiscal'];
            $empresa->CodigoPostal = $factura_json['LugarExpedicion'];
            $empresa->user_id = Auth::id();
            $empresa->save();

            $empresaData = $empresa;
        }

        $this->factura_id = $factura->id;
        $this->empresa_id = $empresaData->id;
        $this->razon_social = $empresaData->RazonSocial;
        $this->RFC = $empresaData->RFC;
        $this->telefono  = $empresaData?->Telefono ? $empresaData->Telefono : 'Ninguno';

        $conceptos = $factura_json['Conceptos']['Concepto'];

        foreach ($conceptos as $concepto) {
            $item = new stdClass;
                $item->icm_cantidad = $concepto['Cantidad'];
                $item->icm_unidad_medida = $concepto['Unidad'];
                $item->icm_concepto = $concepto['Descripcion'];
                $item->icm_precio_u = $concepto['ValorUnitario'];
                $item->icm_importe = floatval($concepto['Importe']);
                $item->icm_partida_presupuestal = '';

            array_push($this->elementosCompraMenor, $item);
        }
        // dd($this->elementosCompraMenor);

        $this->CalculateTotals();
        $this->dispatch('simpleAlert','Datos cargados correctamente','success');
    }

    public function RemoveFromList($id){
        unset($this->elementosCompraMenor[$id]);
        $this->CalculateTotals();
        $this->dispatch('simpleAlert','Eliminado correctamente','success');
    }

    // Get Totals
    public function CalculateTotals()
    {
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

    public function setPartidaP($value,$id)
    {
        $this->elementosCompraMenor[$id]->icm_partida_presupuestal = $value;
    }

    // Ways of Save
    public function Save()
    {
        if (!$this->is_editing) {

            $this->folio = Helper::FolioGenerator(new CompraMenor, 'cm_folio', 5, 'CM', $this->userSedeCode);

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
            $this->compra_CM->factura_cm_id = $this->factura_id;
            $this->compra_CM->empresa_id = $this->empresa_id;
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

            $this->dispatch('alertCRUD', 'Exito!', 'Enviado correctamente', 'success');
        } else {

            $this->validate();

            // Search CompraMenor
            $this->compra_CM = CompraMenor::where('cm_folio', $this->edit_to_folio)->first();
            // Get item list
            $all_items = CompraMenorList::where('icm_folio', $this->edit_to_folio)->get();

            foreach ($all_items as $item_list) {
                $item_list->delete();
            }

            if ($this->compra_CM->cm_creation_status == 'Enviado') {
                $this->compra_CM->cm_folio = $this->folio;
            } else {
                if (str_starts_with($this->compra_CM->cm_folio, '&')) {
                    $get_user = User::where('id', $this->compra_to_edit->solicitante_id)->first();
                    $this->compra_CM->cm_folio = Helper::FolioGenerator(new CompraMenor, 'cm_folio', 5, 'CM', Helper::GetSpecificUserSede($get_user)->Serie);
                }else{
                    $this->compra_CM->cm_folio = $this->folio;
                }
            }

            $this->compra_CM->cm_asunto = $this->asunto;
            $this->compra_CM->mir_id_fin = $this->fin_mir;
            $this->compra_CM->mir_id_proposito = $this->proposito_mir;
            $this->compra_CM->mir_id_componente = $this->componente_mir;
            $this->compra_CM->mir_id_actividad = $this->actividad_mir;
            if($this->compra_CM->factura_cm_id == ''){
                $this->compra_CM->factura_cm_id = $this->factura_id;
            }
            if($this->compra_CM->empresa_id == ''){
                $this->compra_CM->empresa_id = $this->empresa_id;
            }
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

            $this->dispatch('alertCRUD', 'Exito!', 'Actualizado correctamente', 'success');
        }

        $this->reset('asunto');
        $this->fecha = date("Y-m-d");
        $this->folio = 'MPEO-CM-00000';
        $this->solicitante = auth()->user()->name;
        $this->sucursal = Helper::GetUserSede()->SedeNombre;
        $this->fin_mir = '';
        $this->proposito_mir = '';
        $this->componente_mir = '';
        $this->actividad_mir = '';
        $this->factura_id = '';
        $this->empresa_id = '';
        return redirect()->route('cajamenor');

    }

    public function SaveAsDraft()
    {

        if (!$this->is_editing) {

            $this->folio = Helper::FakeFolioGenerator(5, 'DRAFT');
            $this->validateOnly($this->asunto);

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
            $this->compra_CM->factura_cm_id = $this->factura_id;
            $this->compra_CM->empresa_id = $this->empresa_id;
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

            $this->dispatch('alertCRUD', 'Exito!', 'Guardado correctamente', 'success');
        } else {

            $this->validateOnly($this->asunto);

            // Search CompraMenor
            $this->compra_CM = CompraMenor::where('cm_folio', $this->edit_to_folio)->first();
            // Get item list
            $all_items = CompraMenorList::where('icm_folio', $this->edit_to_folio)->get();

            foreach ($all_items as $item_list) {
                $item_list->delete();
            }

            $this->compra_CM->cm_folio = $this->folio;
            $this->compra_CM->cm_asunto = $this->asunto;
            $this->compra_CM->mir_id_fin = $this->fin_mir;
            $this->compra_CM->mir_id_proposito = $this->proposito_mir;
            $this->compra_CM->mir_id_componente = $this->componente_mir;
            $this->compra_CM->mir_id_actividad = $this->actividad_mir;
            if($this->compra_CM->factura_cm_id == ''){
                $this->compra_CM->factura_cm_id = $this->factura_id;
            }
            if($this->compra_CM->empresa_id == ''){
                $this->compra_CM->empresa_id = $this->empresa_id;
            }
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

            $this->dispatch('alertCRUD', 'Exito!', 'Actualizado correctamente', 'success');
        }

        $this->reset('asunto');
        $this->fecha = date("Y-m-d");
        $this->folio = 'MPEO-CM-00000';
        $this->solicitante = auth()->user()->name;
        $this->sucursal = Helper::GetUserSede()->SedeNombre;
        $this->fin_mir = '';
        $this->proposito_mir = '';
        $this->componente_mir = '';
        $this->actividad_mir = '';
        return redirect()->route('cajamenor');
    }
}
