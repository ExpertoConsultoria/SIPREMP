<?php

namespace App\Livewire\N5\BandejaEntrada;

use Livewire\Component;

class BERechazada extends Component
{
    public function render()
    {
        return view('livewire.n5.bandeja-entrada.b-e-rechazada');
    }

    public function getDetails()
    {
    return redirect()->to(route("bandejaentrada.status"));
    }
}
