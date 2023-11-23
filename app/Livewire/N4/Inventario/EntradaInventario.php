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

    public $nombreXML = '';
    public $extensionFile = '';

    public $factura_CM;
    public $add_xml;

    public $items_inventario = [];
    public $item_compra;
    // Vales_entrada_material Table data
    public $fecha;
    public $folio;
    public $id_receptor;
    public $entrego_material;
    public $material_recibido = 1;
    public $token_recepcion = 1;
    public $token_entrega = 1;
    public $estatus_SG = 0;

    // materiales_entregados Table data
    public $cantidad;
    public $unidad_medida;
    public $concepto;
    public $precio_unitario;
    public $vale_perteneciente;
    public $partida_presupuestal;

    // Select Data
    public $fines_mir = [];
    public $propositos_mir = [];
    public $componetes_mir = [];
    public $actividades_mir = [];
    public $partidas_presupuestales = [];

    public $userSede;
    public $userSedeCode;
    public $specificUserSede;
    public $specificUserSedeCode;

    public function render()
    {
        return view('livewire.n4.inventario.entrada-inventario');
    }

    public function mount()
    {
        $this->is_loading_xml = false;
        $this->is_valid_xml = false;
        $this->is_done = false;

        $this->userSede = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->SedeNombre;
        $this->userSedeCode = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->Serie;

        $this->fines_mir = Plan1Fin::all();
        $this->partidas_presupuestales = PptoDeEgreso::all();
    }


    protected function rules()
    {
        return [
            'factura_XML' => 'required|max:382',
        ];
    }

    protected $messages = [
        'factura_XML.required' => 'Este campo es Obligatorio.',
        'factura_XML.max' => 'El tamaño del archivo es muy grande.',
    ];

    public function loadDataXML()
    {

        $this->dispatch('simpleAlert','Archivo Cargado Correctamente','success');
        $xml = file_get_contents('storage\files\FacturasCM\XML\IKYiWyJPzb2UWHAYhi7sAV7x7C1CGeMVR3HOS5hs.xml');
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
            $item -> partida_presupuestal = '';
            array_push($this -> items_inventario, $item);
    }
        // $this->dispatch('simpleAlert','Datos cargados correctamente','success');
    }

    public function saveEntrada() {
        $this->validate();
        $this -> folio = Helper::FolioGenerator(new Vales_entrada_material, 'folio', 5, 'vem', $this->userSedeCode);

        $vale_entrada = new Vales_entrada_material();
        $vale_entrada -> folio = $this -> folio;
        $vale_entrada -> fecha = date('Y-m-d');
        $vale_entrada -> lugar = $this -> userSede;
        $vale_entrada -> id_receptor = 1;
        $vale_entrada -> entrego_material = 1;
        $vale_entrada -> material_recibido = 1;
        $vale_entrada -> estatus_SG = 0;
        $vale_entrada -> token_recepcion = $this -> token_recepcion;
        $vale_entrada -> token_entrega = $this -> token_entrega;
        $vale_entrada -> save();

        foreach ($this -> items_inventario as $item) {
            $i = 0;
            $this -> item_compra = new Materiales_recibidos();
            $this -> item_compra -> vales_entrada_materials_id = 1;
            $this -> item_compra -> cantidad = $item -> cantidad;
            $this -> item_compra -> unidad_medida = $item -> unidad_medida;
            $this -> item_compra -> concepto = $item -> concepto;
            $this -> item_compra -> precio_unitario = $item -> precio_unitario;
            $this -> item_compra -> importe = $item -> importe;
            $this -> item_compra -> partidas_presupuestales_id = $item -> partida_presupuestal;
            $this -> item_compra -> save();
        }
    }


    public function validateXML()
    {

        $this->validate();
        $this->nombreXML = $this->factura_XML->getClientOriginalName();
        $this->extensionFile = $this->factura_XML->extension();

        if (strcmp( $this->extensionFile, 'xml' ) === 0) {
            $this->xml_message = 'Tipo de Archivo Revisado y Aprovado';
            $this->is_valid_xml = true;
            'storage/'.$this->factura_XML->store('files/FacturasCM/XML','public');
        } else {
            $this->xml_message = 'El archivo que subiste no es XML';
        }
    }


    public function setPartidaP($value, $id)
    {
        $this -> items_inventario[$id] -> partida_presupuestal = $value;
    }
}
