<?php

namespace App\Livewire\N4\Vales;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Helpers\Helper;
use stdClass;

use App\Models\Vales_compra;
use App\Models\Elementos_Vale_compra;

use App\Models\User;
use App\Models\Archivos;
use App\Models\Empresa;
use App\Models\proveedores_temporales;
use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;
use App\Models\PptoDeEgreso;

class VCreate extends Component
{
    // Edit Class
        public $edit_to_folio = '';
        public $vale_to_edit;
        public $solicitante;

    // Fields
        public $folio;
        public $fecha;
        public $id_usuario;
        public $lugar;

        public $NoFin;
        public $NoProposito;
        public $NoComponente;
        public $NoActividad;

        public $id_proveedor = '';

        public $justificacion;
        public $lugar_entrega = '';
        public $fecha_entrega;

        public $provedor_selected;

        public $subtotal = 0.00;
        public $iva = 0.00;
        public $total = 0.00;

        // Elementos
        public $cantidad;
        public $unidad_medida;
        public $concepto;
        public $p_u;
        public $importe;
        public $partida_presupuestal;

    // Table Data
        public $elementosVale = [];

    // To Create
        public $vale;
        public $vale_item;
        public $is_editing = false;

        public $userSede;
        public $userSedeCode;
        public $specificUserSede;
        public $specificUserSedeCode;

    // Reactive

        public $buscar = '';
        //Almacena los datos para sugerencia
        public $resultados = [];
        // Muestra la lista de sugerencias de la busqueda
        public $showResults = false;
        //Almacena el Id del proveedor Seleccionado
        public $seleccionado;

        // Proveedor
        public $razon_social = '---';
        public $RFC = '---';
        public $telefono = '---';
        public $tipo_proveedor;

        // Select Data
        public $fines_mir = [];
        public $propositos_mir = [];
        public $componetes_mir = [];
        public $actividades_mir = [];
        public $partidas_presupuestales = [];

        // MIR Interactions
        public $mir2 = false;
        public $mir3 = false;
        public $mir4 = false;

        public $partidas_data = [];

        //
        public $vale_compra;
        public $sucursal;
        public $proposito_mir;
        public $componente_mir;
        public $actividad_mir;
        public $vale_item_compra;

        // ? ATRIBUTOS PROVEEDOR_TEMPORAL
        public $onAddProveedor = false;

        public $new_nombre;
        public $new_telefono;
        public $new_persona;
        public $new_direccion;
        public $new_codigo_postal;
        public $new_razon_social;
        public $new_RFC;
        public $new_regimen;
        public $new_datos_banco;

    protected function rules() {
        return [
            'NoFin' => 'required',
            'NoProposito' => 'required',
            'NoComponente' => 'required',
            'NoActividad' => 'required',

            // 'id_proveedor' => 'required',
            'justificacion'   => 'required|string',
            'lugar_entrega'   => 'required|string',
            'fecha_entrega' => 'required|date',
        ];
    }

    protected $messages = [
        // 'id_proveedor.required' => 'No ha seleccionado ningún Proveedor.',

        'justificacion.required' => 'Este campo es Obligatorio.',
        'justificacion.string' => 'Texto Invalido.',

        'lugar_entrega.required' => 'Este campo es Obligatorio.',
        'lugar_entrega.string' => 'Texto Invalido.',

        'fecha_entrega.required' => 'Este campo es Obligatorio.',
        'fecha_entrega.date' => 'No es una fecha.',

        'NoFin.required' => 'Este campo es Obligatorio.',
        'NoProposito.required' => 'Este campo es Obligatorio.',
        'NoComponente.required' => 'Este campo es Obligatorio.',
        'NoActividad.required' => 'Este campo es Obligatorio.',

        // Element List
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

        'partida_presupuestal.required' => 'Este campo es Obligatorio.',
    ];
    protected $listeners = ['loadProveedor'];

    public function mount()
    {
        $this->partida_presupuestal = '';
        $this->fines_mir = Plan1Fin::all();
        $this->partidas_presupuestales = PptoDeEgreso::all();

        if($this->edit_to_folio == ''){

            // Data for Vale
                $this->userSedeCode = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->Serie;
                $this->userSede = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->SedeNombre;

                // Basic Data
                $this->folio = "MPEO-VCS-00000";
                $this->fecha = date('Y-m-d');
                $this->id_usuario = Auth::user()->id;
                $this->lugar = $this->userSede;

                // Mir
                $this->NoFin = '';
                $this->NoProposito = '';
                $this->NoComponente = '';
                $this->NoActividad = '';

                // Entrega
                $this->justificacion = null;
                $this->lugar_entrega = '';
                $this->fecha_entrega = '';

                // Elementos de Compra
                $this->unidad_medida = '';
                $this->concepto = '';
        }else{
            // Search CompraMenor
            $this->vale_to_edit = Vales_compra::where('folio', $this->edit_to_folio)->first();
            $this -> tipo_proveedor = $this->vale_to_edit -> tipo_proveedor ? $this->vale_to_edit -> tipo_proveedor : 'Fijo';
            // Get item list
            $all_items = Elementos_Vale_compra::where('vales_compra_id', $this->vale_to_edit->id)->get();

            foreach ($all_items as $item_list) {
                $item = new stdClass;
                $item->v_cantidad = $item_list->cantidad;
                $item->v_unidad_medida = $item_list->unidad_medida;
                $item->v_concepto = $item_list->concepto;
                $item->v_precio_u = $item_list->precio_unitario;
                $item->v_importe = $item_list->importe;
                $item->v_partida_presupuestal = $item_list->partida_presupuestal;

                array_push($this->elementosVale, $item);
            }

            // Activate Editing Action
            $this->is_editing = true;

            // Search Proveedor Data by ID
            $this->id_proveedor = $this->vale_to_edit->id_proveedor;

            $this->getProvedor($this->id_proveedor);

            // User Data
            $this->id_usuario = $this->vale_to_edit->id_usuario;
            $this->solicitante = $this->vale_to_edit->solicitante->name;

            $this->specificUserSede = is_string(Helper::GetSpecificUserSede($this->vale_to_edit->solicitante)) ? Helper::GetSpecificUserSede($this->vale_to_edit->solicitante) : Helper::GetSpecificUserSede($this->vale_to_edit->solicitante)->SedeNombre;
            $this->specificUserSedeCode = is_string(Helper::GetSpecificUserSede($this->vale_to_edit->solicitante)) ? Helper::GetSpecificUserSede($this->vale_to_edit->solicitante) : Helper::GetSpecificUserSede($this->vale_to_edit->solicitante)->Serie;
            $this->lugar = $this->specificUserSede;

            $this->sucursal = Helper::GetSpecificUserSede($this->vale_to_edit->solicitante)->SedeNombre;
            $this->cotizacion = $this->vale_to_edit->archivos_id;

            // Values that can be set here
            $this->fecha = $this->vale_to_edit->fecha;
            $this->folio = $this->vale_to_edit->folio;
            $this->justificacion = $this->vale_to_edit->justificacion;
            $this->fecha_entrega = $this->vale_to_edit->fecha_entrega;
            $this->lugar_entrega = $this->vale_to_edit->lugar_entrega;

            $this->DesglosarPorPartidas();
            $this->CalculateTotals();

            $this->NoFin = $this->vale_to_edit->NoFin;
            $this->GetProposes($this->NoFin);
            $this->NoProposito = $this->vale_to_edit->NoProposito;
            $this->GetComponents($this->NoProposito);
            $this->NoComponente = $this->vale_to_edit->NoComponente;
            $this->GetActivities($this->NoComponente);
            $this->NoActividad = $this->vale_to_edit->NoActividad;

        }
    }

    public function render()
    {
        return view('livewire.n4.vales.v-create');
    }

    // Buscar Proveedor
        public function searchProveedor(){
            if(!empty($this->buscar)) {
                $this->resultados = Empresa::orderby('RazonSocial', 'asc')
                    ->where('RazonSocial', 'like', '%' . $this->buscar . '%')
                    ->get();
                $this->showResults = true;
                $this->tipo_proveedor = 'Fijo';
                $this->provedor_selected = '';
            } else {
                $this->showResults = false;
            }
        }

        public function getProvedor(){
            $id = $this->provedor_selected;
            if ( $this->tipo_proveedor == 'Temporal' ) {
                $provedorTemp = proveedores_temporales::find($id);

                $this->id_proveedor = $provedorTemp->id;
                $this->razon_social = $provedorTemp->RazonSocial;
                $this->RFC = $provedorTemp->RFC;
                $this->telefono = $provedorTemp->Telefono ? $provedorTemp->Telefono : 'Ninguno';
                $this -> tipo_proveedor = 'Temporal';
                return;
            } else if ( $this -> tipo_proveedor == 'Fijo' ) {
                $empresa = Empresa::find($id);
                $this -> onAddProveedor = false;
                //Reset Data
                $this->buscar = $empresa->RazonSocial;
                $this->seleccionado = $empresa;
                $this->showResults = false;
                $this -> tipo_proveedor = 'Fijo';

                // Set Provedor Data
                $this->id_proveedor = $empresa->id;
                $this->razon_social = $empresa->RazonSocial;
                $this->RFC = $empresa->RFC;
                $this->telefono = $empresa->Telefono ? $empresa->Telefono : 'Ninguno';
            }
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
                $item->v_cantidad = $this->cantidad;
                $item->v_unidad_medida = $this->unidad_medida;
                $item->v_concepto = $this->concepto;
                $item->v_precio_u = $this->p_u;
                $item->v_importe = $this->importe;
                $item->v_partida_presupuestal = $this->partida_presupuestal;

            array_push($this->elementosVale, $item);

            $this->reset([
                'cantidad',
                'unidad_medida',
                'concepto',
                'p_u',
                'importe'
            ]);
            $this->partida_presupuestal = '';

            $this->DesglosarPorPartidas();
            $this->CalculateTotals();
            $this->dispatch('simpleAlert','Agregado correctamente','success');
        }

        public function CalculateTotals() {
            $this->subtotal = 0;
            $items = $this->elementosVale;
            $this->elementosVale = [];

            foreach ($items as $element) {
                $this->subtotal += $element->v_importe;
                array_push($this->elementosVale, $element);
            }

            $this->iva = $this->subtotal * 0.16;
            $this->iva = number_format($this->iva, 2, '.', '');

            $this->total = $this->subtotal * 1.16;
            $this->total = number_format($this->total, 2, '.', '');

            // dump(['Subtotal='.$this->subtotal,'IVA='.$this->iva,'Total='.$this->total]);
        }

        public function RemoveFromList($element){
            $element= json_decode(json_encode($element), FALSE);

            foreach ($this->elementosVale as $key => $vale_data) {
                if($vale_data == $element){
                    unset($this->elementosVale[$key]);
                }
            }

            $this->CalculateTotals();
            $this->DesglosarPorPartidas();
            $this->dispatch('simpleAlert','Eliminado correctamente','success');
        }

        public function RemoveByPartida($partida){
            $partida = json_decode(json_encode($partida), FALSE);

            foreach ($this->partidas_data as $key => $data) {
                if($data == $partida){

                    foreach ($this->elementosVale as $key => $vale_data) {
                        foreach ($partida->elementos as $element) {
                            if($vale_data == $element){
                                unset($this->elementosVale[$key]);
                            }
                        }
                    }

                    unset($this->partidas_data[$key]);
                }
            }
            $this->CalculateTotals();
            $this->DesglosarPorPartidas();
            $this->dispatch('simpleAlert','Eliminado correctamente','success');
        }

        public function DesglosarPorPartidas(){

            $this->partidas_data = [];

            foreach ($this->partidas_presupuestales as $partida) {

                $dataPartida = new stdClass;
                $dataPartida->nombre = $partida->CvePptal;

                // Obtenemos los elementos que concuerden con esta partida
                $dataPartida->elementos = [];
                foreach ($this->elementosVale as $item) {
                    if($item->v_partida_presupuestal === $partida->CvePptal){
                        array_push($dataPartida->elementos,$item);
                    }
                }

                // Obtenemos los totales
                $dataPartida->subtotal = 0;
                foreach ($dataPartida->elementos as $elemnto) {
                    $dataPartida->subtotal += $elemnto->v_importe;
                }

                $dataPartida->iva = $dataPartida->subtotal * 0.16;
                $dataPartida->iva = number_format($dataPartida->iva, 2, '.', '');

                $dataPartida->total_compra = $dataPartida->subtotal * 1.16;
                $dataPartida->total_compra = number_format($dataPartida->total_compra, 2, '.', '');

                // Definimos el estado a partir del total
                if ($dataPartida->total_compra <= 172000) {
                    $dataPartida->estado = 'DISPONIBLE';
                }else{
                    $dataPartida->estado = 'NO DISPONIBLE';
                }

                // Si hay algun elemento con esta partida
                if(count($dataPartida->elementos)){
                    array_push($this->partidas_data,$dataPartida);
                }
            }
        }

    // Ways for Save
        public function Save(){
            $this->validate();
            if(count($this->elementosVale)){

                if (!$this->is_editing) {
                    $this->folio = Helper::FolioGenerator(new Vales_compra, 'folio', 6, 'VCS', $this->userSedeCode);
                    $token = strtoupper(Str::random(5));

                    $this->vale_compra = new Vales_compra();
                    $this->vale_compra->folio = $this->folio;
                    $this->vale_compra->fecha = $this->fecha;
                    $this->vale_compra->id_usuario = $this->id_usuario;
                    $this->vale_compra->lugar = $this->lugar;
                    $this->vale_compra->NoFin = $this->NoFin;
                    $this->vale_compra->NoProposito = $this->NoProposito;
                    $this->vale_compra->NoComponente = $this->NoComponente;
                    $this->vale_compra->NoActividad = $this->NoActividad;
                    $this->vale_compra->id_proveedor = $this->id_proveedor;
                    $this->vale_compra->justificacion = $this->justificacion;
                    $this->vale_compra->lugar_entrega = $this->lugar_entrega;
                    $this->vale_compra->fecha_entrega = $this->fecha_entrega;
                    $this->vale_compra->subtotal = $this->subtotal;
                    $this->vale_compra->iva = $this->iva;
                    $this->vale_compra->total_compra = $this->total;
                    $this->vale_compra->token_solicitante = $token;
                    $this->vale_compra->tipo_proveedor = $this -> tipo_proveedor;

                    if ( $this -> onAddProveedor ) {
                        $nuevoProveedor = new proveedores_temporales([
                            'Nombre' => $this->new_nombre,
                            'Telefono' => $this->new_telefono,
                            'Persona' => $this->new_persona,
                            'Direccion' => $this->new_direccion,
                            'CodigoPostal' => $this->new_codigo_postal,
                            'RazonSocial' => $this->razon_social,
                            'RFC' => $this->new_RFC,
                            'regimen' => $this->new_regimen,
                            'datosBanco' => $this->new_datos_banco,
                            'DatosContacto' => $this->telefono,
                        ]);
                        $nuevoProveedor->save();
                        $this -> id_proveedor = $nuevoProveedor -> id;
                    }
                    $this->vale_compra->id_proveedor = $this -> id_proveedor;

                    if(Auth::user()->roles[0]->name === 'N3:UNTE'){
                        $this->vale_compra->creation_status = 'Validado';
                        $this->memorandum->pass_filter = 1;
                    }else{
                        $this->vale_compra->creation_status = 'Enviado';
                    }

                    $this->vale_compra->save();

                    foreach ($this->elementosVale as $item) {
                        $this->vale_item_compra = new Elementos_Vale_compra();
                        $this->vale_item_compra->vales_compra_id = $this->vale_compra->id;
                        $this->vale_item_compra->cantidad = $item->v_cantidad;
                        $this->vale_item_compra->unidad_medida = $item->v_unidad_medida;
                        $this->vale_item_compra->concepto = $item->v_concepto;
                        $this->vale_item_compra->partida_presupuestal = $item->v_partida_presupuestal;
                        $this->vale_item_compra->precio_unitario = $item->v_precio_u;
                        $this->vale_item_compra->importe = $item->v_importe;
                        $this->vale_item_compra->save();
                    }
                    $this->dispatch('alertCRUD', 'Exito!', 'Vale Generado Correctamente', 'success');

                } else {

                    $this->vale_compra = Vales_compra::where('folio', $this->edit_to_folio)->first();
                    $previous_items = Elementos_Vale_compra::where('vales_compra_id', $this->vale_to_edit->id)->get();
                    foreach ($previous_items as $item) {
                        $item->delete();
                    }

                    if ($this->vale_compra->creation_status == 'Enviado') {
                        $this->vale_compra->folio = $this->folio;
                    } else {
                        if (str_starts_with($this->vale_compra->folio, '&')) {
                            $this->vale_compra->folio = Helper::FolioGenerator(new Vales_compra, 'folio', 6, 'VCS', $this->specificUserSedeCode);
                        }else{
                            $this->vale_compra->folio = $this->folio;
                        }
                    }

                    $this->vale_compra->fecha = $this->fecha;
                    $this->vale_compra->id_usuario = $this->id_usuario;
                    $this->vale_compra->lugar = $this->lugar;
                    $this->vale_compra->NoFin = $this->NoFin;
                    $this->vale_compra->NoProposito = $this->NoProposito;
                    $this->vale_compra->NoComponente = $this->NoComponente;
                    $this->vale_compra->NoActividad = $this->NoActividad;
                    $this->vale_compra->id_proveedor = $this->id_proveedor;
                    $this->vale_compra->justificacion = $this->justificacion;
                    $this->vale_compra->lugar_entrega = $this->lugar_entrega;
                    $this->vale_compra->fecha_entrega = $this->fecha_entrega;
                    $this->vale_compra->subtotal = $this->subtotal;
                    $this->vale_compra->iva = $this->iva;
                    $this->vale_compra->total_compra = $this->total;
                    $this->vale_compra->tipo_proveedor = $this -> tipo_proveedor;


                    if ( $this -> onAddProveedor ) {
                        $nuevoProveedor = new proveedores_temporales([
                            'Nombre' => $this->new_nombre,
                            'Telefono' => $this->new_telefono,
                            'Persona' => $this->new_persona,
                            'Direccion' => $this->new_direccion,
                            'CodigoPostal' => $this->new_codigo_postal,
                            'RazonSocial' => $this->razon_social,
                            'RFC' => $this->new_RFC,
                            'regimen' => $this->new_regimen,
                            'datosBanco' => $this->new_datos_banco,
                            'tipo_proveedor' => $this->tipo_proveedor,
                            'DatosContacto' => $this->telefono,
                        ]);
                        $nuevoProveedor->save();
                        $this -> id_proveedor = $nuevoProveedor -> id;
                    }
                    $this -> vale_compra -> id_proveedor = $this -> id_proveedor;
                    if(Auth::user()->roles[0]->name === 'N3:UNTE'){
                        $this->vale_compra->creation_status = 'Validado';
                        $this->memorandum->pass_filter = 1;
                    }else{
                        $this->vale_compra->creation_status = 'Enviado';
                    }

                    $this->vale_compra->save();

                    foreach ($this->elementosVale as $item) {
                        $this->vale_item_compra = new Elementos_Vale_compra();
                        $this->vale_item_compra->vales_compra_id = $this->vale_compra->id;
                        $this->vale_item_compra->cantidad = $item->v_cantidad;
                        $this->vale_item_compra->unidad_medida = $item->v_unidad_medida;
                        $this->vale_item_compra->concepto = $item->v_concepto;
                        $this->vale_item_compra->partida_presupuestal = $item->v_partida_presupuestal;
                        $this->vale_item_compra->precio_unitario = $item->v_precio_u;
                        $this->vale_item_compra->importe = $item->v_importe;
                        $this->vale_item_compra->save();
                    }
                    $this->dispatch('alertCRUD', 'Exito!', 'Vale Generado Correctamente', 'success');
                }

                return redirect()->route('vales.send-revised');
            } else {
                $this->dispatch('alertCRUD', 'Error!', 'No se puede generar una Vale de Compra o Servicio sin elementos', 'error');
                return;
            }
        }

        public function SaveAsDraft(){

            if (!$this->is_editing) {
                $validatedData = $this->validate([
                    'justificacion'   => 'required|string',
                    'lugar_entrega'   => 'required|string',
                    'fecha_entrega' => 'required|date',
                ]);

                $this->folio = Helper::FakeFolioGenerator(5, 'DRAFT');
                $token = strtoupper(Str::random(5));

                $this->vale_compra = new Vales_compra();
                $this->vale_compra->folio = $this->folio;
                $this->vale_compra->fecha = $this->fecha;
                $this->vale_compra->id_usuario = $this->id_usuario;
                $this->vale_compra->lugar = $this->lugar;
                $this->vale_compra->NoFin = $this->NoFin;
                $this->vale_compra->NoProposito = $this->NoProposito;
                $this->vale_compra->NoComponente = $this->NoComponente;
                $this->vale_compra->NoActividad = $this->NoActividad;
                $this->vale_compra->id_proveedor = $this->id_proveedor;
                $this->vale_compra->justificacion = $this->justificacion;
                $this->vale_compra->lugar_entrega = $this->lugar_entrega;
                $this->vale_compra->fecha_entrega = $this->fecha_entrega;
                $this->vale_compra->subtotal = $this->subtotal;
                $this->vale_compra->iva = $this->iva;
                $this->vale_compra->total_compra = $this->total;
                $this->vale_compra->token_solicitante = $token;
                $this->vale_compra->tipo_proveedor = $this -> tipo_proveedor;

                $this->vale_compra->creation_status = 'Borrador';

                if ( $this -> onAddProveedor ) {
                    $nuevoProveedor = new proveedores_temporales([
                        'Nombre' => $this->new_nombre,
                        'Telefono' => $this->new_telefono,
                        'Persona' => $this->new_persona,
                        'Direccion' => $this->new_direccion,
                        'CodigoPostal' => $this->new_codigo_postal,
                        'RazonSocial' => $this->razon_social,
                        'RFC' => $this->new_RFC,
                        'regimen' => $this->new_regimen,
                        'datosBanco' => $this->new_datos_banco,
                        'tipo_proveedor' => $this->tipo_proveedor,
                        'DatosContacto' => $this->telefono,
                    ]);
                    $nuevoProveedor->save();
                    $this -> id_proveedor = $nuevoProveedor -> id;
                }
                $this->vale_compra->id_proveedor = $this -> id_proveedor;
                $this->vale_compra->save();

                foreach ($this->elementosVale as $item) {
                    $this->vale_item_compra = new Elementos_Vale_compra();
                    $this->vale_item_compra->vales_compra_id = $this->vale_compra->id;
                    $this->vale_item_compra->cantidad = $item->v_cantidad;
                    $this->vale_item_compra->unidad_medida = $item->v_unidad_medida;
                    $this->vale_item_compra->concepto = $item->v_concepto;
                    $this->vale_item_compra->partida_presupuestal = $item->v_partida_presupuestal;
                    $this->vale_item_compra->precio_unitario = $item->v_precio_u;
                    $this->vale_item_compra->importe = $item->v_importe;
                    $this->vale_item_compra->save();
                }

                $this->dispatch('alertCRUD', 'Exito!', 'Borrador Generado Correctamente', 'success');
            } else {
                $validatedData = $this->validate([
                    'justificacion'   => 'required|string',
                    'lugar_entrega'   => 'required|string',
                    'fecha_entrega' => 'required|date',
                ]);

                $previous_items = Elementos_Vale_compra::where('vales_compra_id', $this->vale_to_edit->id)->get();

                foreach ($previous_items as $item) {
                    $item->delete();
                }

                $this->vale_compra = Vales_compra::where('folio', $this->edit_to_folio)->first();

                    $this->vale_compra->NoFin = $this->NoFin;
                    $this->vale_compra->NoProposito = $this->NoProposito;
                    $this->vale_compra->NoComponente = $this->NoComponente;
                    $this->vale_compra->NoActividad = $this->NoActividad;
                    $this->vale_compra->id_proveedor = $this->id_proveedor;
                    $this->vale_compra->justificacion = $this->justificacion;
                    $this->vale_compra->lugar_entrega = $this->lugar_entrega;
                    $this->vale_compra->fecha_entrega = $this->fecha_entrega;
                    $this->vale_compra->subtotal = $this->subtotal;
                    $this->vale_compra->iva = $this->iva;
                    $this->vale_compra->total_compra = $this->total;
                    $this->vale_compra->tipo_proveedor = $this->tipo_proveedor;

                    $this->vale_compra->creation_status = 'Borrador';

                    if ( $this -> onAddProveedor ) {
                        $nuevoProveedor = new proveedores_temporales([
                            'Nombre' => $this->new_nombre,
                            'Telefono' => $this->new_telefono,
                            'Persona' => $this->new_persona,
                            'Direccion' => $this->new_direccion,
                            'CodigoPostal' => $this->new_codigo_postal,
                            'RazonSocial' => $this->razon_social,
                            'RFC' => $this->new_RFC,
                            'regimen' => $this->new_regimen,
                            'datosBanco' => $this->new_datos_banco,
                            'tipo_proveedor' => $this->tipo_proveedor,
                            'DatosContacto' => $this->telefono,
                        ]);
                        $nuevoProveedor->save();
                        $this -> id_proveedor = $nuevoProveedor -> id;
                    }
                $this->vale_compra->id_proveedor = $this -> id_proveedor;
                $this->vale_compra->save();

                foreach ($this->elementosVale as $item) {
                    $this->vale_item_compra = new Elementos_Vale_compra();
                    $this->vale_item_compra->vales_compra_id = $this->vale_compra->id;
                    $this->vale_item_compra->cantidad = $item->v_cantidad;
                    $this->vale_item_compra->unidad_medida = $item->v_unidad_medida;
                    $this->vale_item_compra->concepto = $item->v_concepto;
                    $this->vale_item_compra->partida_presupuestal = $item->v_partida_presupuestal;
                    $this->vale_item_compra->precio_unitario = $item->v_precio_u;
                    $this->vale_item_compra->importe = $item->v_importe;
                    $this->vale_item_compra->save();
                }

                $this->dispatch('alertCRUD', 'Exito!', 'Borrador Actualizado Correctamente', 'success');

            }
            return redirect()->route('vales.borradores');

        }

    public function loadProveedor($data_proveedor) {
        $this -> onAddProveedor = true;
        $this -> tipo_proveedor = 'Temporal';

        $this -> new_nombre = $data_proveedor['new_nombre'];
        $this -> new_telefono = $data_proveedor['new_telefono'];
        $this -> new_persona = $data_proveedor['new_persona'];
        $this -> new_direccion = $data_proveedor['new_direccion'];
        $this -> new_codigo_postal = $data_proveedor['new_codigo_postal'];
        $this -> new_razon_social = $data_proveedor['new_razon_social'];
        $this -> new_RFC = $data_proveedor['new_RFC'];
        $this -> new_regimen = $data_proveedor['new_regimen'];
        $this -> new_datos_banco = $data_proveedor['new_datos_banco'];

        $this -> razon_social = $this -> new_razon_social;
        $this -> RFC = $this -> new_RFC;
        $this -> telefono = $this -> new_telefono;
        $this->dispatch('closeModal');
        $this->dispatch('simpleAlert', 'Se agregaron los datos del proveedor Correctamente', 'success');
    }
}