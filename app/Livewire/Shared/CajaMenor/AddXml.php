<?php

namespace App\Livewire\Shared\CajaMenor;


use Livewire\Component;
use Illuminate\Support\Facades\File;
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
