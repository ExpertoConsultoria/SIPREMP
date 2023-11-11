<?php

namespace App\Livewire\N4\Expediente;

use Livewire\Component;

class EList extends Component
{
    public function render()
    {
        return view('livewire.n4.expediente.e-list');
    }

    public function getDetails()
    {
    return redirect()->to(route("expediente.detalles"));
    }
}