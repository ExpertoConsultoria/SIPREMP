<?php

namespace App\Livewire\N17A\CajaMenor;

use Livewire\Component;

use Livewire\Redirector;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Empresa;
use App\Models\FacturaCM;
use App\Models\CompraMenor;
use App\Models\CompraMenorList;

use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;

use PhpCfdi\CfdiCleaner\Cleaner;
use CfdiUtils\Nodes\XmlNodeUtils;
use PhpCfdi\CfdiToPdf\CfdiDataBuilder;
use PhpCfdi\CfdiToPdf\Converter;
use PhpCfdi\CfdiToPdf\Builders\Html2PdfBuilder;

class CCMDetalles extends Component
{

    // Id by URL
    public $details_of_folio = '';

    // Data
        public $fecha;
        public $solictante;
        public $sucursal;
        public $MIR;
        public $justificacion;
        public $proveedor;
        public $razon_social;
        public $RFC;
        public $telefono;
        public $subtotal;
        public $iva;
        public $total;

        public $elementos = [];
        public $compra_data;

        public $factura;
        public $is_pdf;

    public function mount()
    {
        // Search CompraMenor
        $this->compra_data = CompraMenor::where('cm_folio',$this->details_of_folio)->first();
        // Get item list
        $this->elementos = CompraMenorList::where('icm_folio', $this->details_of_folio)->get();
        // Get Solicitante
        $get_user = User::where('id',$this->compra_data->solicitante_id)->first();
        // Get Proveedor
        $this->proveedor = Empresa::where('id',$this->compra_data->empresa_id)->first();
        // Forge Mir
        $fin = Plan1Fin::where('id',$this->compra_data->mir_id_fin)->first();
        $proposito = Plan2Proposito::where('id',$this->compra_data->mir_id_proposito)->first();
        $componente = Plan3Componente::where('id',$this->compra_data->mir_id_componente)->first();
        $actividad = Plan4Actividad::where('id',$this->compra_data->mir_id_actividad)->first();

        $mir =$fin->NoFin.'-'.$proposito->NoProposito.'-'.$componente->NoComponente.'-'.$actividad->NoActividad;

        // Asignar Datos
        $this->fecha = $this->compra_data->cm_fecha;
        $this->solictante = $get_user->name;
        $this->sucursal = $this->compra_data->sucursal;
        $this->MIR = $mir;
        $this->justificacion = $this->compra_data->cm_asunto;
        $this->subtotal = $this->compra_data->cm_subtotal;
        $this->iva = $this->compra_data->cm_iva;
        $this->total = $this->compra_data->cm_total;

        $this->razon_social = $this->proveedor->RazonSocial ? $this->proveedor->RazonSocial : 'ND';
        $this->RFC = $this->proveedor->RFC;
        $this->telefono = $this->proveedor->Telefono ? $this->proveedor->Telefono : 'Ninguno';

        $this->factura = FacturaCM::find($this->compra_data->factura_cm_id);

        $this->is_pdf = $this->factura->fcm_pdf_ruta != '' ? true : false;

    }

    public function render()
    {
        return view('livewire.n17-a.caja-menor.c-c-m-detalles');
    }

    public function getFactura(){

        $xml = file_get_contents($this->factura->fcm_xml_ruta);

        // clean cfdi
        $xml = Cleaner::staticClean($xml);

        // create the main node structure
        $comprobante = XmlNodeUtils::nodeFromXmlString($xml);

        // create the CfdiData object, it contains all the required information
        $cfdiData = (new CfdiDataBuilder())->build($comprobante);

        // create the converter
        $converter = new Converter(
            new Html2PdfBuilder()
        );

        $route = 'storage/files/FacturasCM/PDF/'.$this->details_of_folio.'.pdf';
        // create the invoice as output.pdf
        $converter->createPdfAs($cfdiData, $route);

        $this->factura->fcm_pdf_ruta = $route;
        $this->factura->save();
        $this->is_pdf=true;

        $this->dispatch('simpleAlert','Archivo Generado Correctamente','success');
    }
}
