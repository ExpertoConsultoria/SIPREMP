<?php

namespace App\Livewire\Shared\Solicitud;

use Livewire\Component;

use Livewire\Redirector;
use App\Models\Memorandum;
use App\Models\MemorandumList;

use Illuminate\Contracts\Support\Renderable;

use App\Helpers\Helper;

class SolicitudStatus extends Component
{
    public $details_of_folio = '';
    public $memorandum_details;
    public $memoList = [];

    public $backButton;
    public function render()
    {
        $this -> backButton = Helper::backButton();
        return view('livewire.shared.solicitud.solicitud-status');
    }

    public function mount() {
        $this -> memorandum_details = Memorandum::where('memo_folio', $this -> details_of_folio) -> first();
        $this -> memorandum_details -> load('solicitante');
        // $this -> memorandum_details -> load('memorandumList');
        $this -> memoList = MemorandumList::where('im_folio', $this -> memorandum_details -> memo_folio) -> get();;
    }
}
