<?php

namespace App\Livewire\Shared\Components;

use LivewireUI\Modal\ModalComponent;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Archivos;

class SeeInvoice extends ModalComponent
{
    public $invoice_id;
    public $invoice;

    public function mount(){
        $this->invoice = Archivos::find($this->invoice_id);
    }

    public function render()
    {
        return view('livewire.shared.components.see-invoice');
    }
}
