<?php

namespace App\Livewire\N3\ComprasConsolidades;

use Livewire\Component;

use App\Models\proveedores_temporales;
use Illuminate\Support\Facades\Auth;

// * proveedores
use App\Models\Empresa;

use App\Helpers\Helper;
use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;
use App\Models\PptoDeEgreso;

use App\Models\compra_consolidada;
use App\Models\item_compra_consolidada;

use stdClass;
class CSNuevaCompraConsolidada extends Component
{

    public $folioToEdit = '';
    public $compraToEdit;

    //? Atributos del proveedor
    public $onAddProveedor = false;
    public $tipo_proveedor;
    public $new_nombre;
    public $new_telefono;
    public $new_persona;
    public $new_direccion;
    public $new_codigo_postal;
    public $new_razon_social;
    public $new_RFC;
    public $new_regimen;
    public $new_datos_contacto;
    public $new_datos_banco;
    public $razon_social = '---';
    public $RFC = '---';
    public $telefono = '---';


    // ? COMPRA CONSOLIDADA DATA
    public $fecha;
    public $folio = '';
    public $justificacion = '';
    // * PARTE DEL ANEXO
    public $asunto = '';
    public $objeto = '';
    public $alcance = '';

    public $procEntrega = '';
    public $entregables = '';
    public $muestras = '';
    public $RRHH = '';
    public $soporte_tecnico = '';
    public $mantenimiento = '';
    public $capacitacion = '';
    public $vigencia = '';
    public $forma_pago = '';
    public $garantia = '';

    public $itemsCompra = [];
    // * ITEM DATA
    public $cantidad;
    public $concepto = '';
    public $precio_unitario;
    public $importe;
    public $partida_presupuestal_id;
    public $subtotal = 0.00;
    public $iva = 0.00;
    public $total = 0.00;

    // * USER DATA
    public $userSede;
    public $userSedeCode;
    public $area = '';
    public $lugar;

    // ? XML DATA
    public $is_loading_xml;
    public $is_valid_xml;
    public $is_done;

    // ** MIR
    public $mir2 = false;
    public $mir3 = false;
    public $mir4 = false;
    public $fines_mir = [];
    public $propositos_mir = [];
    public $componetes_mir = [];
    public $actividades_mir = [];
    public $partidas_presupuestales = [];
    public $partidas_data = [];
    public $fin_mir = '';
    public $proposito_mir = '';
    public $componente_mir = '';
    public $actividad_mir = '';
    public $mir_id_cotizacion = '';
    public $NoActividad = '';

    // ? Proveedores
    public $proveedores = [];
    public $showResults = false;
    public $id_proveedor = 0;
    public $buscar;
    public $seleccionado;
    
    public $sucursal;

    protected $listeners = ['loadProveedor'];
    protected function rules() {
        return [
            'folio'   => 'required|string',
            'fecha' => 'required|date',
            'lugar' => 'required|date',
            'area' => 'required|date',

            'cantidad' => 'required',
            'concepto' => 'required',
            'precio_unitario' => 'required',
            'importe' => 'required',
            'partida_presupuestal_id' => 'required',

            'fin_mir' => 'required',
            'proposito_mir' => 'required',
            'componente_mir' => 'required',
            'NoActividad' => 'required',

            // 'id_proveedor' => 'required',
            'justificacion'   => 'required|string',

            // ? datos del anexo
            'asunto' => 'required',
            'objeto' => 'required',
            'alcance' => 'required',
            'procEntrega' => 'required',
            'entregables' => 'required',
            'muestras' => 'required',
            'RRHH' => 'required',
            'soporte_tecnico' => 'required',
            'mantenimiento' => 'required',
            'capacitacion' => 'required',
            'vigencia' => 'required',
            'forma_pago' => 'required',
            'garantia' => 'required',
        ];
    }

    protected $messages = [
        // 'id_proveedor.required' => 'No ha seleccionado ningún Proveedor.',

        'justificacion.required' => 'La justificacion es obligatoria.',
        'justificacion.string' => 'Texto Invalido.',
        
        'lugar.required' => 'La justificacion es obligatoria.',
        'area.required' => 'La justificacion es obligatoria.',

        'lugar_entrega.required' => 'Este campo es Obligatorio.',
        'lugar_entrega.string' => 'Texto Invalido.',

        'fecha_entrega.required' => 'Este campo es Obligatorio.',
        'fecha_entrega.date' => 'No es una fecha.',

        // MIR data
        'fin_mir' => 'El campo de fin es requerido',
        'proposito_mir' => 'El campo de proposito es requerido',
        'componente_mir' => 'El campo de componente es requerido',
        'NoActividad' => 'El campo de actividad es requerido',

        // Element List
        'cantidad.required' => 'La cantidad es un campo Obligatorio.',
        'cantidad.numeric' => 'La cantidad debe ser un numero.',

        // 'unidad_medida.required' => 'Este campo es Obligatorio.',
        'unidad_medida.string' => 'Texto Invalido.',
        'concepto.required' => 'El concepto es un campo obligatorio.',
        'concepto.string' => 'Texto Invalido.',

        'precio_unitario.required' => 'El precio unitario es un campo Obligatorio.',
        'precio_unitario.string' => 'Texto Invalido.',

        'importe.required' => 'El importe es un campo Obligatorio.',
        'importe.string' => 'Texto Invalido.',

        'partida_presupuestal_id.required' => 'La partida presupuestal es un campo Obligatorio.',

        // ? datos del anexo
        'asunto' => 'el asunto es necesario',
        'objeto' => 'el objeto es necesario',
        'alcance' => 'el alcance es necesario',
        'procEntrega' => 'el procedimiento de entrega es necesario',
        'entregables' => 'es necesario especificar los entregables',
        'muestras' => 'es necesario especificar las muestras',
        'RRHH' => 'es necesario especificar los recursos humanos',
        'soporte_tecnico' => 'es necesario especificar el soporte tecnico',
        'mantenimiento' => 'es necesario especificar el mantenimiento',
        'capacitacion' => 'es necesario especificar la capacitacion',
        'vigencia' => 'es necesario especificar la vigencia',
        'forma_pago' => 'es necesario especificar la forma de pago',
        'garantia' => 'es necesario especificar la garantia',
    ];

    public function render()
    {
        return view('livewire.n3.compras-consolidades.c-s-nueva-compra-consolidada');
    }

    public function mount() {
        $this->sucursal = Helper::GetSpecificUserSede(Auth::user())->SedeNombre;

        $this->fines_mir = Plan1Fin::all();
        $this->partidas_presupuestales = PptoDeEgreso::all();    

        if ( $this -> folioToEdit ) {
            $this -> compraToEdit = compra_consolidada::where('folio', $this -> folioToEdit) -> first();
            $items = item_compra_consolidada::where('compra_consolidada_id', $this -> compraToEdit -> id) -> get();
            foreach( $items as $itemList ) {
                $item = new stdClass;
                $item -> cantidad = $itemList -> cantidad;
                $item -> concepto = $itemList -> concepto;
                $item -> importe = $itemList -> importe;
                $item -> status = 'fromDraft';
                $item -> precio_unitario = $itemList -> precio_unitario;
                $item -> partida_presupuestal_id = $itemList -> partida_presupuestal;
                $item -> total = $itemList -> total;
                $item -> compra_consolidada_id = $itemList -> compra_consolidada_id;
                array_push($this -> itemsCompra, $item);          
            }
            // dd($this -> itemsCompra);
            // dd($this -> compraToEdit);
            $this -> fecha = $this -> compraToEdit -> fecha;
            // * TODO GENERAR FOLIO EN BORRADOR
            $this -> folio = $this -> compraToEdit -> folio;
            $this -> justificacion = $this -> compraToEdit -> justificacion;
            $this -> area = $this -> compraToEdit -> area;
            $this -> sucursal = $this -> compraToEdit -> sucursal;
            // ? Anexo CompraCons
            $this -> asunto = $this -> compraToEdit -> asunto;
            $this -> objeto = $this -> compraToEdit -> objeto;
            $this -> alcance = $this -> compraToEdit -> alcance;
            $this -> procEntrega = $this -> compraToEdit -> procedimiento_entrega;
            $this -> entregables = $this -> compraToEdit -> entregables;
            $this -> muestras = $this -> compraToEdit -> muestras;
            $this -> RRHH = $this -> compraToEdit -> recursos_humanos;
            $this -> soporte_tecnico = $this -> compraToEdit -> soporte_tecnico;
            $this -> mantenimiento = $this -> compraToEdit -> mantenimiento;
            $this -> capacitacion = $this -> compraToEdit -> capacitacion;
            $this -> vigencia = $this -> compraToEdit -> vigencia;
            $this -> forma_pago = $this -> compraToEdit -> forma_pago;
            $this -> garantia = $this -> compraToEdit -> garantia;

            // ATRIBUTOS MIR
            $this -> fin_mir = $this -> compraToEdit -> fin_mir;
            $this -> proposito_mir = $this -> compraToEdit -> proposito_mir;
            $this -> componente_mir = $this -> compraToEdit -> componente_mir;
            $this -> mir_id_cotizacion = $this -> compraToEdit -> mir_id_cotizacion;
            $this -> NoActividad = $this -> compraToEdit -> mir_id_actividad;
            
            $this -> id_proveedor = $this -> compraToEdit -> id_proveedor;
            $this -> tipo_proveedor = $this -> compraToEdit -> tipo_proveedor;
            
            $this -> getProvedor( $this -> id_proveedor );
            // $this -> estado = $compra_consolidada -> estado;

            $this->fin_mir = $this->compraToEdit -> mir_id_fin;
            $this->GetProposes($this -> fin_mir);
            $this->proposito_mir = $this -> compraToEdit -> mir_id_proposito;
            $this->GetComponents($this -> proposito_mir);
            $this->componente_mir = $this -> compraToEdit -> mir_id_componente;
            $this->GetActivities($this -> componente_mir);
            $this->actividad_mir = $this -> compraToEdit -> mir_id_actividad;

            $this -> DesglosarPorPartidas();
            $this -> CalculateTotals();  
        } else if ( !$this -> folioToEdit ) {
            $this->fecha = date("Y-m-d");
            $this->folio = "CC-EI-00000";
    
            $this->userSede = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->SedeNombre;
            $this->userSedeCode = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->Serie;
            $this->lugar = $this->userSede;
            $this->area = 'N/D';
        }
    }

    /**
     * Funcion para DAR DE ALTA DAR DE ALTA // ? PROVEEDOR TEMPORAL
     */
    public function loadProveedor($data_proveedor) {
        try {
            //code...
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
            $this -> new_datos_contacto = $data_proveedor['new_datos_contacto'];

            $this -> razon_social = $this -> new_razon_social;
            $this -> RFC = $this -> new_RFC;
            $this -> telefono = $this -> new_telefono;
            $this->dispatch('closeModal');
            $this->dispatch('simpleAlert', 'Se agregaron los datos del proveedor Correctamente', 'success');
        } catch ( \Exception $e ) {
            dd($e);
        }
    }

    // ? Buscar proveedor
    public function searchProveedor(){
        if(!empty($this->buscar)) {
            $this->proveedores = Empresa::orderby('RazonSocial', 'asc')
                ->where('RazonSocial', 'like', '%' . $this->buscar . '%')
                ->get();
            $this->showResults = true;
            $this -> tipo_proveedor = 'Fijo';
        } else {
            $this->showResults = false;
        }
    }

    public function getProvedor($id) {
        if ( $this -> tipo_proveedor == 'Temporal' ) {
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
            $this->buscar = $empresa -> RazonSocial;
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

    // * AGREGAR ITEM
    public function AddToList() {
        $this -> validate([
            'cantidad' => 'required',
            'concepto' => 'required',
            'precio_unitario' => 'required',
            'importe' => 'required',
            'partida_presupuestal_id' => 'required',
        ]);
        $itemCompra = new stdClass;
        $itemCompra -> cantidad = $this -> cantidad;
        $itemCompra -> concepto = $this -> concepto;
        $itemCompra -> precio_unitario = $this -> precio_unitario;
        $itemCompra -> importe = $this -> importe;
        $itemCompra -> status = 'new';
        $itemCompra -> partida_presupuestal_id = $this -> partida_presupuestal_id;
        array_push($this -> itemsCompra, $itemCompra);

        $this -> DesglosarPorPartidas();
        $this -> CalculateTotals();

        $this -> reset([
            'cantidad',
            'concepto',
            'precio_unitario',
            'importe',
            'partida_presupuestal_id',
        ]);
    }

    public function RemoveFromList($element){
        $element= json_decode(json_encode($element), FALSE);

        foreach ($this->itemsCompra as $key => $vale_data) {
            if($vale_data == $element){
                unset($this->itemsCompra[$key]);
            }
        }

        $this->CalculateTotals();
        $this->DesglosarPorPartidas();
        $this->dispatch('simpleAlert','Eliminado correctamente','success');
    }

    public function RemoveByPartida($partida) {
        $partida = json_decode(json_encode($partida), FALSE);

        foreach ($this->partidas_data as $partidaKey => $data) {
            if ($data == $partida) {

                foreach ($this->itemsCompra as $valeKey => $vale_data) {
                    foreach ($partida->elementos as $element) {
                        if ($vale_data == $element) {
                            unset($this->itemsCompra[$valeKey]);
                        }
                    }
                }

                unset($this->partidas_data[$partidaKey]);
            }
        }

        $this->CalculateTotals();
        $this->DesglosarPorPartidas();
        $this->dispatch('simpleAlert', 'Eliminado correctamente', 'success');
    }

    // ? MIR FUNCTIONS
    public function setPartidaP($value, $id)
    {
        $this -> items_inventario[$id] -> partida_presupuestal = $value;
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

    public function CalculateTotals() {
        $this->subtotal = 0;
        $items = $this->itemsCompra;
        $this->itemsCompra = [];

        foreach ($items as $element) {
            $this->subtotal += $element->importe;
            array_push($this->itemsCompra, $element);
        }

        $this->iva = $this->subtotal * 0.16;
        $this->iva = number_format($this->iva, 2, '.', '');

        $this->total = $this->subtotal * 1.16;
        $this->total = number_format($this->total, 2, '.', '');

        // dump(['Subtotal='.$this->subtotal,'IVA='.$this->iva,'Total='.$this->total]);
    }

    public function CalculateAmount() {
        if (is_numeric($this->cantidad) && is_numeric($this->precio_unitario)) {
            $cantidad = floatval($this->cantidad);
            $p_u = floatval($this->precio_unitario);

            $importe = $cantidad * $p_u;

            $this->importe = number_format($importe, 2, '.', '');
        } else {
            $this->importe = 0;
        }
    }


    public function DesglosarPorPartidas(){

        $this->partidas_data = [];

        foreach ($this->partidas_presupuestales as $partida) {

            $dataPartida = new stdClass;
            $dataPartida->nombre = $partida->CvePptal;

            // Obtenemos los elementos que concuerden con esta partida
            $dataPartida->elementos = [];
            foreach ($this->itemsCompra as $item) {
                if($item->partida_presupuestal_id === $partida->CvePptal){
                    array_push($dataPartida->elementos,$item);
                }
            }

            // Obtenemos los totales
            $dataPartida->subtotal = 0;
            foreach ($dataPartida->elementos as $elemnto) {
                $dataPartida->subtotal += $elemnto->importe;
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

    
    public function saveDraft() 
    {
        try {
            //code...
            $this -> validate([
                'folio' => 'required|string',
                'fecha' => 'required|date',
    
                'fin_mir' => 'required',
                'proposito_mir' => 'required',
                'componente_mir' => 'required',
                'NoActividad' => 'required',
    
                // 'id_proveedor' => 'required',
                'justificacion'   => 'required|string',
    
                // ? datos del anexo
                // 'asunto' => 'required',
                // 'objeto' => 'required',
                // 'alcance' => 'required',
                // 'procEntrega' => 'required',
                // 'entregables' => 'required',
                // 'muestras' => 'required',
                // 'RRHH' => 'required',
                // 'soporte_tecnico' => 'required',
                // 'mantenimiento' => 'required',
                // 'capacitacion' => 'required',
                // 'vigencia' => 'required',
                // 'forma_pago' => 'required',
                // 'garantia' => 'required',
            ]);

            if ( $this -> folioToEdit ) {
                // Update the attributes
                $this -> compraToEdit -> fecha = $this->fecha;
                $this -> compraToEdit -> folio = $this->folio;
                $this -> compraToEdit -> justificacion = $this->justificacion;
                $this -> compraToEdit -> sucursal = $this->sucursal;
                $this -> compraToEdit -> area = $this->area;
                // Anexo CompraCons
                $this -> compraToEdit -> asunto = $this -> asunto;
                $this -> compraToEdit -> objeto = $this -> objeto;
                $this -> compraToEdit -> alcance = $this -> alcance;
                $this -> compraToEdit -> procedimiento_entrega = $this -> procEntrega;
                $this -> compraToEdit -> entregables = $this -> entregables;
                $this -> compraToEdit -> muestras = $this -> muestras;
                $this -> compraToEdit -> recursos_humanos = $this -> RRHH;
                $this -> compraToEdit -> soporte_tecnico = $this -> soporte_tecnico;
                $this -> compraToEdit -> mantenimiento = $this -> mantenimiento;
                $this -> compraToEdit -> capacitacion = $this -> capacitacion;
                $this -> compraToEdit -> vigencia = $this -> vigencia;
                $this -> compraToEdit -> forma_pago = $this -> forma_pago;
                $this -> compraToEdit -> garantia = $this -> garantia;
                // ... (Repeat the above for other properties)

                // ATRIBUTOS MIR
                $this -> compraToEdit -> mir_id_fin = $this->fin_mir;
                $this -> compraToEdit -> mir_id_proposito = $this->proposito_mir;
                $this -> compraToEdit -> mir_id_componente = $this->componente_mir;
                $this -> compraToEdit -> mir_id_cotizacion = $this->mir_id_cotizacion;
                $this -> compraToEdit -> mir_id_actividad = $this->NoActividad;

                $this -> compraToEdit -> id_proveedor = $this->id_proveedor;
                $this -> compraToEdit -> tipo_proveedor = $this->tipo_proveedor;

                // Save the changes
                $this -> compraToEdit -> save();
                
                foreach ($this -> itemsCompra as $item) {
                    # code...
                // dd($this -> itemsCompra);
                if ( $item -> status == 'new' ) {
                    item_compra_consolidada::create([
                        'cantidad' => $item -> cantidad,
                        'concepto' => $item -> concepto,
                        'precio_unitario' => $item -> precio_unitario,
                        'importe' => $item -> importe,
                        'partida_presupuestal' => $item -> partida_presupuestal_id,
                        'compra_consolidada_id' => $this -> compraToEdit -> id,
                        'total' => $item -> cantidad * $item -> precio_unitario
                    ]);
                }
                }
                $this->dispatch('alertCRUD', 'Compra consolidada actualizada', 'Se actualizó el borrador de esta compra consolidada!', 'success');
                return redirect()->route('compraconsolidada');    
            }
            
            $this -> folio = Helper::FakeFolioGenerator(5, 'DRAFT-CC');

            if ( $this -> tipo_proveedor == 'Temporal' ) {
                $provedor_temporal = proveedores_temporales::create([
                    'RFC' => $this -> new_RFC,
                    'RazonSocial' => $this -> new_razon_social,
                    'Persona' => $this -> new_persona,
                    'Nombre' => $this -> new_nombre,
                    'Telefono' => $this -> new_telefono,
                    'Regimen' => $this -> new_regimen,
                    'Direccion' => $this -> new_direccion,
                    'CodigoPostal' => $this -> new_codigo_postal,
                    'DatosContacto' => $this -> new_datos_contacto,
                    'DatosBanco' => $this -> new_datos_banco,
                ]);
                $this -> id_proveedor = $provedor_temporal -> id;
            }
            $compra_consolidada = compra_consolidada::create([
                'fecha' => $this -> fecha,
                // * TODO GENERAR FOLIO EN BORRADOR
                'folio' => $this -> folio,
                'justificacion' => $this -> justificacion,
                'sucursal' => $this -> sucursal,
                'area' => $this -> area,
                // ? Anexo CompraCons
                'asunto' => $this -> asunto,
                'objeto' => $this -> objeto,
                'alcance' => $this -> alcance,
                'procedimiento_entrega' => $this -> procEntrega,
                'entregables' => $this -> entregables,
                'muestras' => $this -> muestras,
                'recursos_humanos' => $this -> RRHH,
                'soporte_tecnico' => $this -> soporte_tecnico,
                'mantenimiento' => $this -> mantenimiento,
                'capacitacion' => $this -> capacitacion,
                'vigencia' => $this -> vigencia,
                'forma_pago' => $this -> forma_pago,
                'garantia' => $this -> garantia,
                // ATRIBUTOS MIR
                'mir_id_fin' => $this -> fin_mir,
                'mir_id_proposito' => $this -> proposito_mir,
                'mir_id_componente' => $this -> componente_mir,
                'mir_id_cotizacion' => $this -> mir_id_cotizacion,
                'mir_id_actividad' => $this -> NoActividad,
                
                'id_proveedor' => $this -> id_proveedor,
                'tipo_proveedor' => $this -> tipo_proveedor,
                
                'estado' => 'Borrador',
            ]);
            foreach ($this -> itemsCompra as $item) {
                # code...
                item_compra_consolidada::create([
                    'cantidad' => $item -> cantidad,
                    'concepto' => $item -> concepto,
                    'precio_unitario' => $item -> precio_unitario,
                    'importe' => $item -> importe,
                    'partida_presupuestal' => $item -> partida_presupuestal_id,
                    'compra_consolidada_id' => $compra_consolidada -> id,
                    'total' => $item -> cantidad * $item -> precio_unitario
                ]);
            }
            $this->dispatch('alertCRUD', 'Compra consolidada cargada', 'La compra consolidada se guardó como borrador!', 'success');
            return redirect()->route('compraconsolidada');
        } catch (\Throwable $th) {
            //throw $th;
            $this -> dispatch('alertCRUD', 
            'Datos insuficientes', 
            'Antes de guardar el borrador, rellene los campos principales del vale!', 
            'error');
            $this -> validate([
                'folio'   => 'required|string',
                'fecha' => 'required|date',
    
                // 'cantidad' => 'required',
                // 'concepto' => 'required',
                // 'precio_unitario' => 'required',
                // 'importe' => 'required',
                // 'partida_presupuestal_id' => 'required',
    
                'fin_mir' => 'required',
                'proposito_mir' => 'required',
                'componente_mir' => 'required',
                'NoActividad' => 'required',
    
                // 'id_proveedor' => 'required',
                'justificacion'   => 'required|string',
    
                // ? datos del anexo
                // 'asunto' => 'required',
                // 'objeto' => 'required',
                // 'alcance' => 'required',
                // 'procEntrega' => 'required',
                // 'entregables' => 'required',
                // 'muestras' => 'required',
                // 'RRHH' => 'required',
                // 'soporte_tecnico' => 'required',
                // 'mantenimiento' => 'required',
                // 'capacitacion' => 'required',
                // 'vigencia' => 'required',
                // 'forma_pago' => 'required',
                // 'garantia' => 'required',
            ]);
            dd($th);
        }
    }

    public function saveCompra() {
        if ( count($this -> itemsCompra) == 0 ) {
            $this -> dispatch('alertCRUD', 
            'Datos insuficientes', 
            'No mande solicitudes sin conceptos de compra!', 
            'error');
            $this -> validate([
                'folio'   => 'required|string',
                'fecha' => 'required|date',
    
                'fin_mir' => 'required',
                'proposito_mir' => 'required',
                'componente_mir' => 'required',
                'NoActividad' => 'required',
    
                // 'id_proveedor' => 'required',
                'justificacion'   => 'required|string',
    
                // ? datos del anexo
                'asunto' => 'required',
                'objeto' => 'required',
                'alcance' => 'required',
                'procEntrega' => 'required',
                'entregables' => 'required',
                'muestras' => 'required',
                'RRHH' => 'required',
                'soporte_tecnico' => 'required',
                'mantenimiento' => 'required',
                'capacitacion' => 'required',
                'vigencia' => 'required',
                'forma_pago' => 'required',
                'garantia' => 'required',
            ]);
            return;
        }

        try {
            $this -> validate([
                'folio'   => 'required|string',
                'fecha' => 'required|date',
    
                'fin_mir' => 'required',
                'proposito_mir' => 'required',
                'componente_mir' => 'required',
                'NoActividad' => 'required',
    
                // 'id_proveedor' => 'required',
                'justificacion'   => 'required|string',
    
                // ? datos del anexo
                'asunto' => 'required',
                'objeto' => 'required',
                'alcance' => 'required',
                'procEntrega' => 'required',
                'entregables' => 'required',
                'muestras' => 'required',
                'RRHH' => 'required',
                'soporte_tecnico' => 'required',
                'mantenimiento' => 'required',
                'capacitacion' => 'required',
                'vigencia' => 'required',
                'forma_pago' => 'required',
                'garantia' => 'required',
            ]);
            $this -> folio = Helper::FolioGenerator(new compra_consolidada, 'folio', 4, 'CC', $this -> sucursal);
            if ( $this -> tipo_proveedor == 'Temporal' ) {
                try {
                    $provedor_temporal = proveedores_temporales::create([
                        'RFC' => $this -> new_RFC,
                        'RazonSocial' => $this -> new_razon_social,
                        'Persona' => $this -> new_persona,
                        'Nombre' => $this -> new_nombre,
                        'Telefono' => $this -> new_telefono,
                        'Regimen' => $this -> new_regimen,
                        'Direccion' => $this -> new_direccion,
                        'CodigoPostal' => $this -> new_codigo_postal,
                        'DatosContacto' => $this -> new_datos_contacto,
                        'DatosBanco' => $this -> new_datos_banco,
                    ]);
                } catch ( \Exception $e) {
                    dd($e);
                }
                $this -> id_proveedor = $provedor_temporal -> id;
            }
            //code...
            if ( $this -> folioToEdit ) {
                // Update the attributes
                $this -> compraToEdit -> fecha = $this -> fecha;
                $this -> compraToEdit -> folio = $this -> folio;
                $this -> compraToEdit -> justificacion = $this->justificacion;
                $this -> compraToEdit -> sucursal = $this->sucursal;
                $this -> compraToEdit -> area = $this->area;
                // Anexo CompraCons
                $this -> compraToEdit -> asunto = $this -> asunto;
                $this -> compraToEdit -> objeto = $this -> objeto;
                $this -> compraToEdit -> alcance = $this -> alcance;
                $this -> compraToEdit -> procedimiento_entrega = $this -> procEntrega;
                $this -> compraToEdit -> entregables = $this -> entregables;
                $this -> compraToEdit -> muestras = $this -> muestras;
                $this -> compraToEdit -> recursos_humanos = $this -> RRHH;
                $this -> compraToEdit -> soporte_tecnico = $this -> soporte_tecnico;
                $this -> compraToEdit -> mantenimiento = $this -> mantenimiento;
                $this -> compraToEdit -> capacitacion = $this -> capacitacion;
                $this -> compraToEdit -> vigencia = $this -> vigencia;
                $this -> compraToEdit -> forma_pago = $this -> forma_pago;
                $this -> compraToEdit -> garantia = $this -> garantia;
                $this -> compraToEdit -> estado = 'Enviado';
                // ... (Repeat the above for other properties)

                // ATRIBUTOS MIR
                $this -> compraToEdit -> mir_id_fin = $this->fin_mir;
                $this -> compraToEdit -> mir_id_proposito = $this->proposito_mir;
                $this -> compraToEdit -> mir_id_componente = $this->componente_mir;
                $this -> compraToEdit -> mir_id_cotizacion = $this->mir_id_cotizacion;
                $this -> compraToEdit -> mir_id_actividad = $this->NoActividad;

                $this -> compraToEdit -> id_proveedor = $this->id_proveedor;
                $this -> compraToEdit -> tipo_proveedor = $this->tipo_proveedor;

                // Save the changes
                $this -> compraToEdit -> save();
                
                foreach ($this -> itemsCompra as $item) {
                    # code...
                // dd($this -> itemsCompra);
                if ( $item -> status == 'new' ) {
                    item_compra_consolidada::create([
                        'cantidad' => $item -> cantidad,
                        'concepto' => $item -> concepto,
                        'precio_unitario' => $item -> precio_unitario,
                        'importe' => $item -> importe,
                        'partida_presupuestal' => $item -> partida_presupuestal_id,
                        'compra_consolidada_id' => $this -> compraToEdit -> id,
                        'total' => $item -> cantidad * $item -> precio_unitario
                    ]);
                }
                }
                $this->dispatch('alertCRUD', 'Compra consolidada actualizada', 'Se actualizó el borrador de esta compra consolidada!', 'success');
                return redirect()->route('compraconsolidada');   
            } else {
                $compra_consolidada = compra_consolidada::create([
                    'fecha' => $this -> fecha,
                    'folio' => $this -> folio,
                    'justificacion' => $this -> justificacion,
                    'sucursal' => $this -> sucursal,
                    'area' => $this -> area,
                    // 'area' => $this -> justificacion,
                    // ? Anexo CompraCons
                    'asunto' => $this -> asunto,
                    'objeto' => $this -> objeto,
                    'alcance' => $this -> alcance,
                    'procedimiento_entrega' => $this -> procEntrega,
                    'entregables' => $this -> entregables,
                    'muestras' => $this -> muestras,
                    'recursos_humanos' => $this -> RRHH,
                    'soporte_tecnico' => $this -> soporte_tecnico,
                    'mantenimiento' => $this -> mantenimiento,
                    'capacitacion' => $this -> capacitacion,
                    'vigencia' => $this -> vigencia,
                    'forma_pago' => $this -> forma_pago,
                    'garantia' => $this -> garantia,
                    // ATRIBUTOS MIR
                    'mir_id_fin' => $this -> fin_mir,
                    'mir_id_proposito' => $this -> proposito_mir,
                    'mir_id_componente' => $this -> componente_mir,
                    'mir_id_cotizacion' => $this -> mir_id_cotizacion,
                    'mir_id_actividad' => $this -> NoActividad,
                    
                    'id_proveedor' => $this -> id_proveedor,
                    'tipo_proveedor' => $this -> tipo_proveedor,
                    
                    'estado' => 'Enviado',
                ]);
                foreach ($this -> itemsCompra as $item) {
                    # code...
                    if ( $item -> status == 'new' ) {
                        item_compra_consolidada::create([
                            'cantidad' => $item -> cantidad,
                            'concepto' => $item -> concepto,
                            'precio_unitario' => $item -> precio_unitario,
                            'importe' => $item -> importe,
                            'partida_presupuestal' => $item -> partida_presupuestal_id,
                            'compra_consolidada_id' => $compra_consolidada -> id,
                            'total' => $item -> cantidad * $item -> precio_unitario
                        ]);
                    }
                }
                $this->dispatch('alertCRUD', 'Compra consolidada cargada', 'La compra consolidada se guardó como borrador!', 'success');
                return redirect()->route('compraconsolidada');
            }
        } catch (\Throwable $th) {
            //throw $th;
            $this -> validate([
                'folio'   => 'required|string',
                'fecha' => 'required|date',
    
                // 'cantidad' => 'required',
                // 'concepto' => 'required',
                // 'precio_unitario' => 'required',
                // 'importe' => 'required',
                // 'partida_presupuestal_id' => 'required',
    
                'fin_mir' => 'required',
                'proposito_mir' => 'required',
                'componente_mir' => 'required',
                'NoActividad' => 'required',
    
                // 'id_proveedor' => 'required',
                'justificacion'   => 'required|string',
    
                // ? datos del anexo
                'asunto' => 'required',
                'objeto' => 'required',
                'alcance' => 'required',
                'procEntrega' => 'required',
                'entregables' => 'required',
                'muestras' => 'required',
                'RRHH' => 'required',
                'soporte_tecnico' => 'required',
                'mantenimiento' => 'required',
                'capacitacion' => 'required',
                'vigencia' => 'required',
                'forma_pago' => 'required',
                'garantia' => 'required',
            ]);
            dd($th);
        }
    }
}
