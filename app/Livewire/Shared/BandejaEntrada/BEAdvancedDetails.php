<?php

namespace App\Livewire\Shared\BandejaEntrada;

use Livewire\Component;

use App\Models\Memorandum;
use App\Models\MemorandumList;

use App\Models\Vales_compra;

use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;

class BEAdvancedDetails extends Component
{
// Id by URL
    public $details_of_folio = '';

    public $memorandum_details;
    public $memoList = [];
    public $MIR;

    public $panel = true;

    protected $listeners = ['createVale', 'rejectMemo'];

    public function mount()
    {
        $this->memorandum_details = Memorandum::where('memo_folio', $this->details_of_folio)->first();
        $this->memorandum_details->load('solicitante');
        $this->memoList = MemorandumList::where('im_folio', $this->memorandum_details->memo_folio)->get();

        if($this->memorandum_details->memo_creation_status === 'Aprobado' && $this->memorandum_details->token_aceptacion != null){
            $this->panel = false;
        }

        // Forge Mir
        $fin = Plan1Fin::where('id',$this->memorandum_details->mir_id_fin)->first();
        $proposito = Plan2Proposito::where('id',$this->memorandum_details->mir_id_proposito)->first();
        $componente = Plan3Componente::where('id',$this->memorandum_details->mir_id_componente)->first();
        $actividad = Plan4Actividad::where('id',$this->memorandum_details->mir_id_actividad)->first();

        $this->MIR =$fin->NoFin.'-'.$proposito->NoProposito.'-'.$componente->NoComponente.'-'.$actividad->NoActividad;
    }

    public function render()
    {
        return view('livewire.shared.bandeja-entrada.b-e-advanced-details');
    }

    #[On('createVale')]
    public function createVale() {
        return redirect()->to(route("vale.create-from-memo", ['details_of_folio'=>$this->details_of_folio]));
    }

    #[On('rejectMemo')]
    public function rejectMemo($reason){

        $memorandum = Memorandum::where('memo_folio', $this->details_of_folio)->first();
        $memorandum->memo_creation_status = 'Rechazado';
        $memorandum->motivo_rechazo = $reason;
        $memorandum->pending_review = 1;
        $memorandum->pass_filter = 1;
        $memorandum->save();

        $this->panel = false;

        $this->dispatch('simpleAlert',
            'Rechazada y Retornada',
            'success'
        );
    }
}
