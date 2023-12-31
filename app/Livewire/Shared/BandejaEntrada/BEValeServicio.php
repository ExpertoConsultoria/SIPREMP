<?php

namespace App\Livewire\Shared\BandejaEntrada;

use Livewire\Component;

use stdClass;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;

use Livewire\Redirector;
use App\Models\Vales_compra;
use App\Models\Elementos_Vale_compra;

use App\Models\Empresa;
use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;
use App\Models\PptoDeEgreso;

class BEValeServicio extends Component
{

    public $details_of_folio = '';
    public $vale_details;
    public $vale_elements = [];

    public $partidas_data = [];
    public $partidas_presupuestales = [];

    public $MIR;
    public $proveedor;

    protected $listeners = ['approveVale', 'rejectVale'];

    public function render()
    {
        return view('livewire.shared.bandeja-entrada.b-e-vale-servicio');
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

    #[On('approveVale')]
    public function approveVale(){


        $vale = Vales_compra::where('folio', $this->details_of_folio)->first();

        if (Auth::user()->hasRole('N3:UNTE')) {
            $vale->creation_status = 'Validado';
            $vale->token_rev_val = strtoupper(Str::random(5));
            $vale->pending_review = 1;
            $vale->pass_filter = 1;
            $vale->save();
        } elseif (Auth::user()->hasRole('N2:CP')) {
            $vale->creation_status = 'Presupuestado';
            $vale->token_disp_ppta = strtoupper(Str::random(5));
            $vale->pending_review = 1;
            $vale->pass_cp = 1;
            $vale->save();
        } elseif (Auth::user()->hasRole('N1:DA')) {
            $vale->creation_status = 'Aprobado';
            $vale->token_autorizacion = strtoupper(Str::random(5));
            $vale->pending_review = 1;
            $vale->save();
        }

        $this->dispatch('simpleAlert',
            '¡Aprobada y Enviada!',
            'success'
        );
        return redirect()->route('vales.send-revised');

    }

    #[On('rejectVale')]
    public function rejectVale($reason){

        $vale = Vales_compra::where('folio', $this->details_of_folio)->first();

        if (Auth::user()->hasRole('N3:UNTE')){
            $vale->creation_status = 'Rechazado';
            $vale->motivo_rechazo = $reason;
            $vale->pending_review = 1;
            $vale->pass_filter = 0;
            $vale->save();
        } elseif (Auth::user()->hasRole('N2:CP')){
            $vale->creation_status = 'Rechazado';
            $vale->motivo_rechazo = $reason;
            $vale->pending_review = 1;
            $vale->pass_cp = 0;
            $vale->save();
        } elseif (Auth::user()->hasRole('N1:DA')){
            $vale->creation_status = 'Rechazado';
            $vale->motivo_rechazo = $reason;
            $vale->pending_review = 1;
            $vale->save();
        }

        $this->dispatch('simpleAlert',
            'Rechazada y Retornada',
            'success'
        );
        return redirect()->route('vales-solicitudes.rechazadas');

    }


}
