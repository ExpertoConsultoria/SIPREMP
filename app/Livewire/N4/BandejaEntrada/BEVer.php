<?php

namespace App\Livewire\N4\BandejaEntrada;

use Livewire\Component;

class BEVer extends Component
{
    public function render()
    {
        return view('livewire.n4.bandeja-entrada.b-e-ver');
    }

    public function ValeCreate()
    {
    return redirect()->to(route("vales.create"));
    }
}
