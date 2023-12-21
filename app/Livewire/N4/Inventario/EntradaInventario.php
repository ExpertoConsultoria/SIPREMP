<?php

namespace App\Livewire\N4\Inventario;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Vales_entrada_material;
use App\Models\Materiales_recibidos;
use PhpCfdi\CfdiToJson\JsonConverter;
use App\Helpers\Helper;

use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;
use App\Models\PptoDeEgreso;
use Illuminate\Support\Facades\File;

use stdClass;

class EntradaInventario extends Component
{
    use WithFileUploads;

    // Field
    public $factura_XML;

    // Interactions
    public $is_loading_xml;
    public $is_valid_xml;
    public $is_done;
    public $xml_message = '';
    public $ruta = '';

    public $nombreXML = '';
    public $extensionFile = '';


    public $items_inventario = [];
    public $item_compra;
    // Vales_entrada_material Table data

    public $folio;
    public $fecha;
    public $lugar;
    public $id_receptor;
    public $entrego_material;
    public $token_recepcion;
    public $token_entrega;
    public $estatus_SG;
    public $asunto;

    // materiales_entregados Table data
    public $cantidad;
    public $unidad_medida;
    public $concepto;
    public $precio_unitario;
    public $partida_presupuestal;

    // Select Data
    public $fines_mir = [];
    public $propositos_mir = [];
    public $componetes_mir = [];
    public $actividades_mir = [];
    public $partidas_presupuestales = [];
    public $selectPartida = [];

    public $userSede;
    public $userSedeCode;
    public $specificUserSede;
    public $specificUserSedeCode;

    // ** MIR
    public $mir2 = false;
    public $mir3 = false;
    public $mir4 = false;

    public $fin_mir = '';
    public $proposito_mir = '';
    public $componente_mir = '';
    public $actividad_mir = '';


    public function render()
    {
        return view('livewire.n4.inventario.entrada-inventario');
    }

    public function mount()
    {
        $this->fecha = date("Y-m-d");
        $this->folio = "SGV-EI-00000";


        $this->is_loading_xml = false;
        $this->is_valid_xml = false;
        $this->is_done = false;

        $this->userSede = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->SedeNombre;
        $this->userSedeCode = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->Serie;
        $this->lugar = $this->userSede;

        $this->fines_mir = Plan1Fin::all();
        $this->partidas_presupuestales = PptoDeEgreso::all();
    }


    protected function rules()
    {
        return [
            'folio' => 'required|string',
            'fecha' => 'required|date',
            'lugar' => 'required|string',
            // 'id_receptor' => 'required|string',

            'asunto' => 'required|string',
            'fin_mir' => 'required',
            'proposito_mir' => 'required',
            'componente_mir' => 'required',
            'actividad_mir' => 'required',
            'lugar' => 'required',

            // 'cantidad' => 'required',
            // 'unidad_medida' => 'required',
            // 'concepto' => 'required',
            // 'precio_unitario' => 'required',
            // 'partida_presupuestal' => 'required',
            'factura_XML' => 'required',
        ];
    }

    protected $messages = [
        'fecha.required' => 'Este campo es Obligatorio.',
        'fecha.date' => 'No es una fecha.',

        'folio.required' => 'El folio es un campo obligatorio.',
        'folio.string' => 'Texto Invalido.',

        'lugar.required' => 'El lugar es un campo Obligatorio.',
        'lugar.string' => 'Texto Invalido.',

        'asunto.required' => 'El asunto es un campo Obligatorio.',
        'asunto.string' => 'Texto Invalido.',

        'fin_mir.required' => 'Los datos del mir son obligatorios.',
        'proposito_mir.required' => 'Los datos del mir son obligatorios.',
        'componente_mir.required' => 'Los datos del mir son obligatorios.',
        'actividad_mir.required' => 'Los datos del mir son obligatorios.',

        'partida_presupuestal.required' => 'La partida presupuestal es un campo Obligatorio.',
        'cantidad' => 'La cantidad es un campo Obligatorio',
        'unidad_medida' => 'La unidad de medida es un campo Obligatorio',
        'concepto' => 'El concepto es un campo Obligatorio',
        'precio_unitario' => 'El precio unitario es un campo Obligatorio',
        // 'partida_presupuestal' => 'Este campo es Obligatorio',
        'factura_XML' => 'El xml es un campo Obligatorio',
    ];

    public function loadDataXML()
    {
        $xml = file_get_contents($this -> ruta);
        $factura_json = JsonConverter::convertToJson($xml);
        $factura_json = json_decode($factura_json, true);
        $conceptos = $factura_json['Conceptos']['Concepto'];

        foreach( $conceptos as $concepto ) {
            $item = new stdClass;
            $item -> cantidad = $concepto['Cantidad'];
            $item -> unidad_medida = $concepto['Unidad'];
            $item -> concepto = $concepto['Descripcion'];
            $item -> precio_unitario = $concepto['ValorUnitario'];
            $item -> importe = floatval($concepto['Importe']);
            array_push($this -> items_inventario, $item);
        }

        foreach ($this->items_inventario as $index => $element) {
            $this->selectPartida[$index] = "";
        }

        $this->is_done = true;
        $this->dispatch('simpleAlert','Archivo Cargado Correctamente','success');
    }

    public function saveEntrada() {
        try {
            $this->validate();
            $this->folio = Helper::FolioGenerator(new Vales_entrada_material, 'folio', 5, 'vem', $this->userSedeCode);
    
            $vale_entrada = new Vales_entrada_material();
            $vale_entrada->folio = $this->folio;
            $vale_entrada -> fecha = date('Y-m-d');
            $vale_entrada -> lugar = $this -> userSede;
            $vale_entrada -> asunto = $this -> asunto;
            $vale_entrada -> mir_id_fin = $this -> fin_mir;
            $vale_entrada -> mir_id_proposito = $this -> proposito_mir;
            $vale_entrada -> mir_id_componente = $this -> componente_mir;
            $vale_entrada -> mir_id_actividad = $this -> actividad_mir;
            $vale_entrada -> id_receptor = null;
            $vale_entrada -> entrego_material = null;
            $vale_entrada -> token_recepcion = null;
            $vale_entrada -> token_entrega = null;
            $vale_entrada -> estatus_SG	 = null;
            $vale_entrada -> save();
    
            foreach ($this -> items_inventario as $item) {
                $this -> item_compra = new Materiales_recibidos();
                $this -> item_compra -> folio_vale_entrada = $vale_entrada -> folio;
                $this -> item_compra -> cantidad = $item -> cantidad;
                $this -> item_compra -> unidad_medida = $item -> unidad_medida;
                $this -> item_compra -> concepto = $item -> concepto;
                $this -> item_compra -> precio_unitario = $item -> precio_unitario;
                $this -> item_compra -> importe = $item -> importe;
                $this -> item_compra -> partida_presupuestal_id = $item -> partida_presupuestal;
                $this -> item_compra -> save();
            }
            $this->dispatch('simpleAlert','Se creó con exito el registro','success');
            return redirect()->route('inventario');    
        } catch ( \Exception $e ) {
            dd($e);
        }
    }

    public function cleanXML() {
        $this->dispatch('cleanDataXML');

        $this->is_loading_xml = false;
        $this->is_valid_xml = false;
        $this->is_done = false;
        File::delete($this -> ruta);
        $this -> items_inventario = [];

    }

    public function validateXML()
    {
        $this->validate([
            'factura_XML' => 'required',
        ]);
        $this->nombreXML = $this->factura_XML->getClientOriginalName();
        $this->extensionFile = $this->factura_XML->extension();

        if (strcmp( $this->extensionFile, 'xml' ) === 0) {
            $this->xml_message = 'Tipo de Archivo Revisado y Aprovado';
            $this->is_valid_xml = true;
            $this -> ruta = 'storage/'.$this->factura_XML->store('files/Inventario/XML','public');
        } else {
            $this->xml_message = 'El archivo que subiste no es XML';
        }
    }

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
}

