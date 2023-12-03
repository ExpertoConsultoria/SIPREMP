<?php

namespace App\Livewire\Shared\Components;

use LivewireUI\Modal\ModalComponent;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Archivos;

class SeeQuote extends ModalComponent
{

    public $quote_id;
    public $quote;

    public function mount(){
        $this->quote = Archivos::find($this->quote_id);
    }

    public function render()
    {
        return view('livewire.shared.components.see-quote');
    }

    function get_quoteID()
    {
        return $this->quote_id;
    }

}
