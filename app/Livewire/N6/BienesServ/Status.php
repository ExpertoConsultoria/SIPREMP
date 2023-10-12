<?php

namespace App\Livewire\N6\BienesServ;

use Livewire\Component;

use App\Models\Memorandum;
use App\Models\MemorandumList;

class Status extends Component
{
    public $details_of_folio = '';
    public $memorandum_details;
    public $memoList = [];
    public function render()
    {
        return view('livewire.n6.bienes-serv.status');
    }

    public function mount() {
        $this -> memorandum_details = Memorandum::where('memo_folio', $this -> details_of_folio) -> first();
        $this -> memorandum_details -> load('solicitante');
        // $this -> memorandum_details -> load('memorandumList');
        $this -> memoList = MemorandumList::where('im_folio', $this -> memorandum_details -> memo_folio) -> get();;
    }
}
