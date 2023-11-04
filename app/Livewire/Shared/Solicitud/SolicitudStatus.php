<?php

namespace App\Livewire\Shared\Solicitud;

use Livewire\Component;

use Livewire\Redirector;
use App\Models\Memorandum;
use App\Models\MemorandumList;

use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;

use Illuminate\Contracts\Support\Renderable;

use App\Helpers\Helper;

class SolicitudStatus extends Component
{
    public $details_of_folio = '';
    public $memorandum_details;
    public $memoList = [];

    public $MIR;

    public function render()
    {
        return view('livewire.shared.solicitud.solicitud-status');
    }

    public function mount() {
        $this-> memorandum_details= Memorandum::where('memo_folio', $this -> details_of_folio) -> first();

        if($this->memorandum_details->pending_review === 1){
            $this->memorandum_details->pending_review = 0;
            $this->memorandum_details->save();
        }

        $this -> memorandum_details -> load('solicitante');
        $this -> memoList = MemorandumList::where('im_folio', $this -> memorandum_details -> memo_folio) -> get();

        $fin = Plan1Fin::where('id',$this->memorandum_details->mir_id_fin)->first();
        $proposito = Plan2Proposito::where('id',$this->memorandum_details->mir_id_proposito)->first();
        $componente = Plan3Componente::where('id',$this->memorandum_details->mir_id_componente)->first();
        $actividad = Plan4Actividad::where('id',$this->memorandum_details->mir_id_actividad)->first();

        $this->MIR =$fin->NoFin.'-'.$proposito->NoProposito.'-'.$componente->NoComponente.'-'.$actividad->NoActividad;
    }
}
