<?php

namespace App\Livewire\N3\ComprasConsolidades;

use Livewire\Component;

use App\Models\proveedores_temporales;

// * proveedores
use App\Models\Empresa;

use App\Helpers\Helper;
use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;
use App\Models\PptoDeEgreso;

use stdClass;
class CSNuevaCompraConsolidada extends Component
{
    //? Atributos del proveedor
    public $onAddProveedor;
    public $tipo_proveedor;
    public $new_nombre;
    public $new_telefono;
    public $new_persona;
    public $new_direccion;
    public $new_codigo_postal;
    public $new_razon_social;
    public $new_RFC;
    public $new_regimen;
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
    public $manenimiento = '';
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

    // ? Proveedores
    public $proveedores = [];
    public $showResults = false;
    public $id_proveedor = 0;
    public $buscar;
    public $seleccionado;

    protected $listeners = ['loadProveedor'];
    protected function rules() {
        return [
            'folio'   => 'required|string',
            'fecha' => 'required|date',

            'cantidad' => 'required',
            'concepto' => 'required',
            'precio_unitario' => 'required',
            'importe' => 'required',
            'partida_presupuestal_id' => 'required',

            'fin_mir' => 'required.',
            'proposito_mir' => 'required.',
            'componente_mir' => 'required.',
            'actividad_mir' => 'required.',

            // 'id_proveedor' => 'required',
            'justificacion'   => 'required|string',

            // ? datos del anexo
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
        $this->fecha = date("Y-m-d");
        $this->folio = "CC-EI-00000";


        $this->is_loading_xml = false;
        $this->is_valid_xml = false;
        $this->is_done = false;

        $this->userSede = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->SedeNombre;
        $this->userSedeCode = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->Serie;
        $this->lugar = $this->userSede;

        $this->fines_mir = Plan1Fin::all();
        $this->partidas_presupuestales = PptoDeEgreso::all();
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

    public function getProvedor($id){
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

    public function CalculateAmount(){
        if (is_numeric($this->cantidad) && is_numeric($this->precio_unitario)) {
            $cantidad = floatval($this->cantidad);
            $p_u = floatval($this->precio_unitario);

            $importe = $cantidad * $p_u;

            $this->importe = number_format($importe, 2, '.', '');
        } else {
            $this->importe = 0;
        }
    }

    public function DesglosarPorPartidas() {

        $this->partidas_data = [];

        foreach ($this -> partidas_presupuestales as $partida) {

            $dataPartida = new stdClass;
            $dataPartida -> nombre = $partida -> CvePptal;

            // Obtenemos los elementos que concuerden con esta partida
            $dataPartida->elementos = [];
            foreach ($this->itemsCompra as $item) {
                // dd($item);
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

            // TODO RECTIFICAR ESTE WE
            if ($dataPartida->total_compra <= 172000) {
                $dataPartida->estado = 'DISPONIBLE';
            }else{
                $dataPartida->estado = 'NO DISPONIBLE';
            }

            // Si hay algun elemento con esta partida
            if(count($dataPartida->elementos)){
                array_push($this->partidas_data, $dataPartida);
            }
        }
    }
}
