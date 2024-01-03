<?php

namespace App\Livewire\Shared\CajaMenor;


use Livewire\Component;
use Illuminate\Support\Facades\File;
use PhpCfdi\CfdiToJson\JsonConverter;
use Illuminate\Support\Facades\Storage;

use App\Models\FacturaCM;
use Livewire\WithFileUploads;

class AddXml extends Component
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
    public $xml_temporal;

    protected function rules()
    {
        return [
            'factura_XML' => 'required|max:400',
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

    public function render()
    {
        return view('livewire.shared.caja-menor.add-xml');
    }

    public function validateXML()
    {

        // Obtenemos los datos del Archivo
        $this->validate();
        $this->nombreXML = $this->factura_XML->getClientOriginalName();
        $this->extensionFile = $this->factura_XML->extension();

        if ((strcmp( $this->extensionFile, 'xml' ) === 0) || (strcmp( $this->extensionFile, 'txt' ) === 0)) {

            $xml_exist = $this->validateExistence();
            $xml_is_empty = $this->checkAmounts();

            if($xml_exist){
                $this->xml_message = 'El archivo que subiste ya ha sido usado anteriormente';
                $this->is_valid_xml = false;
            } else{
                if($xml_is_empty){
                    $this->xml_message = 'El archivo que subiste tiene un Importe Final de $0';
                    $this->is_valid_xml = false;
                }else{
                    $this->xml_message = 'Archivo Revisado y Aprovado';
                    $this->is_valid_xml = true;
                }
            }
            File::delete($this->xml_temporal);
        } else {
            $this->xml_message = 'El archivo que subiste no es XML';
        }

    }

    public function checkAmounts() {
        $this->xml_temporal = 'storage/'.$this->factura_XML->store('files/FacturasCM/XML','public');
        $xml_content = file_get_contents($this->xml_temporal);
        $xml_json = JsonConverter::convertToJson($xml_content);
        $xml_json = json_decode($xml_json, true);


        if(array_key_exists('Concepto', $xml_json['Conceptos'])){

            $conceptos = $xml_json['Conceptos']['Concepto'];
            $importe_final = 0;

            foreach ($conceptos as $concepto) {
                if(
                    (floatval($concepto['Importe']) != 0) &&
                    ((floatval( $concepto['Cantidad']) * floatval( $concepto['ValorUnitario'])) > 0)
                ) {
                    $importe_final += floatval($concepto['Importe']);
                }
            }
            if($importe_final <= 0){
                $this->dispatch('simpleAlert','Factura de Egresos Detectada','error');
                return true;
            } else{
                return false;
            }
        }else{
            $this->dispatch('simpleAlert','Factura sin conceptos Detectada','error');
            return true;
        }

    }

    public function validateExistence() {
        $this->xml_temporal = 'storage/'.$this->factura_XML->store('files/FacturasCM/XML','public');
        $xml_content = file_get_contents($this->xml_temporal);
        $xml_json = JsonConverter::convertToJson($xml_content);
        $xml_json = json_decode($xml_json, true);

        $files = FacturaCM::all();

        foreach ($files as $file) {
            $factura_contents = file_get_contents($file->fcm_xml_ruta);
            $factura_json = JsonConverter::convertToJson($factura_contents);
            $factura_json = json_decode($factura_json, true);

            if($xml_json === $factura_json){
                if ($xml_json['Complemento']['TimbreFiscalDigital']['UUID'] === $factura_json['Complemento']['TimbreFiscalDigital']['UUID']) {
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

    }

    public function newFactura(){

        $this->factura_CM = new FacturaCM();
        $this->factura_CM->fcm_nombre = $this->nombreXML;
        $this->factura_CM->fcm_extension = $this->extensionFile;
        $this->factura_CM->fcm_xml_ruta = 'storage/'.$this->factura_XML->store('files/FacturasCM/XML','public');

        $this->factura_CM->save();

        $this->is_loading_xml = false;
        $this->is_valid_xml = false;
        $this->is_done = true;

        $this->dispatch('loadDataXML', $this->factura_CM->id);
    }

    public function cleanXML(){
        $this->dispatch('cleanDataXML');

        $this->is_loading_xml = false;
        $this->is_valid_xml = false;
        $this->is_done = false;

        $rcm_factura = FacturaCM::find($this->factura_CM->id);
            File::delete($rcm_factura->fcm_xml_ruta);
            $rcm_factura->delete();

        $this->factura_CM = null;
        $this->reset();
    }
}
