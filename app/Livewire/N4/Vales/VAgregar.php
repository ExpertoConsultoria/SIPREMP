<?php

namespace App\Livewire\N4\Vales;

use Livewire\Component;

use stdClass;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\File;

use Livewire\Redirector;
use App\Models\Vales_compra;
use App\Models\Elementos_Vale_compra;

use App\Models\Empresa;
use App\Models\Archivos;
use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;
use App\Models\PptoDeEgreso;

class VAgregar extends Component
{
    public $details_of_folio = '';
    public $vale_details;
    public $vale_elements = [];

    public $partidas_data = [];
    public $partidas_presupuestales = [];

    public $MIR;
    public $proveedor;

    // For Files
    public $invoice;
    public $evidence;

    public function render()
    {
        return view('livewire.n4.vales.v-agregar');
    }

    public function mount() {
        $this->vale_details = Vales_compra::where('folio', $this->details_of_folio)->first();

        $this->vale_elements = Elementos_Vale_compra::where('vales_compra_id', $this->vale_details->id)->get();
        $this->vale_details->load('solicitante');

        // Forge Mir
        $fin = Plan1Fin::where('id',$this->vale_details->NoFin)->first();
        $proposito = Plan2Proposito::where('id',$this->vale_details->NoProposito)->first();
        $componente = Plan3Componente::where('id',$this->vale_details->NoComponente)->first();
        $actividad = Plan4Actividad::where('id',$this->vale_details->NoActividad)->first();

        $this->MIR =$fin->NoFin.'-'.$proposito->NoProposito.'-'.$componente->NoComponente.'-'.$actividad->NoActividad;

        // Proveedor Data
        $this->proveedor = Empresa::find($this->vale_details->id_proveedor);

        // Desglosar Partidas

        $this->partidas_presupuestales = PptoDeEgreso::all();

        $this->partidas_data = [];

        foreach ($this->partidas_presupuestales as $partida) {

            $dataPartida = new stdClass;
            $dataPartida->nombre = $partida->CvePptal;

            // Obtenemos los elementos que concuerden con esta partida
            $dataPartida->elementos = [];
            foreach ($this->vale_elements as $item) {
                if($item->partida_presupuestal === $partida->CvePptal){
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

    protected $listeners = ['AssignInvoice','AssignEvidence'];

    // Facturas
    public function AssignInvoice($invoice_id){

        if($this->vale_details->id_factura != null){
            $this->invoice = Archivos::find($this->vale_details->id_factura);
                File::delete($this->invoice->arch_ruta);
                $this->invoice->delete();
        }

        $this->vale_details->id_factura = $invoice_id;
        $this->vale_details->save();

        $this->dispatch('closeModal');
        $this->dispatch('simpleAlert', 'Asigando correctamente', 'success');

    }

    // Evidencias
    public function AssignEvidence($evidence_id){

        if($this->vale_details->id_evidencia != null){
            $this->evidence = Archivos::find($this->vale_details->id_evidencia);
                File::delete($this->evidence->arch_ruta);
                $this->evidence->delete();
        }

        $this->vale_details->id_evidencia = $evidence_id;
        $this->vale_details->save();

        $this->dispatch('closeModal');
        $this->dispatch('simpleAlert', 'Asigando correctamente', 'success');

    }
}
