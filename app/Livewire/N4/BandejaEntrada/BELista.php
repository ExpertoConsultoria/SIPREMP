<?php

namespace App\Livewire\N4\BandejaEntrada;

use Livewire\Component;

class BELista extends Component
{
    public function render()
    {
        return view('livewire.n4.bandeja-entrada.b-e-lista');
    }

    public function getDetails()
    {
    return redirect()->to(route("bandejaentrada.ver"));
    }
}
