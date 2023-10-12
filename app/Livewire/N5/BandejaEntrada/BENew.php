<?php

namespace App\Livewire\N5\BandejaEntrada;

use Livewire\Component;

class BENew extends Component
{
    public function render()
    {
        return view('livewire.n5.bandeja-entrada.b-e-new');
    }
    
    public function getDetails()
    {
    return redirect()->to(route("bandejaentrada.details"));
    }
}
