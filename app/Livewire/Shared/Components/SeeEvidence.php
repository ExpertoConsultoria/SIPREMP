<?php

namespace App\Livewire\Shared\Components;

use LivewireUI\Modal\ModalComponent;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Archivos;

class SeeEvidence extends ModalComponent
{
    public $evidence_id;
    public $evidence;

    public function mount(){
        $this->evidence = Archivos::find($this->evidence_id);
    }

    public function render()
    {
        return view('livewire.shared.components.see-evidence');
    }
}
