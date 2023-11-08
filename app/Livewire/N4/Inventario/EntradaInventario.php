<?php

namespace App\Livewire\N4\Inventario;

use Livewire\Component;
use Livewire\WithFileUploads;

class EntradaInventario extends Component
{
    use WithFileUploads;

    public $folio_vale = 'SP-0001';
    public $unidad_medida;
    public $cantidad;
    public $concepto;
    public $memoranda_id;
    public $partida_presupuestal;

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


    public function render()
    {
        return view('livewire.n4.inventario.entrada-inventario');
    }

    public function saveEntrada() {

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

    public function mount()
    {
        $this->is_loading_xml = false;
        $this->is_valid_xml = false;
        $this->is_done = false;
    }

    public function validateXML()
    {

        $this->validate();
        $this->nombreXML = $this->factura_XML->getClientOriginalName();
        $this->extensionFile = $this->factura_XML->extension();

        if (strcmp( $this->extensionFile, 'xml' ) === 0) {
            $this->xml_message = 'Tipo de Archivo Revisado y Aprovado';
            $this->is_valid_xml = true;
        } else {
            $this->xml_message = 'El archivo que subiste no es XML';
        }

    }


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
}
