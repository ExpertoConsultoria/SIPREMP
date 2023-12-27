<?php

namespace App\Livewire\Shared\Components;

use LivewireUI\Modal\ModalComponent;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Archivos;

class SeeSignedVoucher extends ModalComponent
{
    public $signed_id;
    public $signed;

    public function mount(){
        $this->signed = Archivos::find($this->signed_id);
    }

    public function render()
    {
        return view('livewire.shared.components.see-signed-voucher');
    }
}
