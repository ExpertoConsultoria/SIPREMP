<?php

namespace App\Livewire\N4\Vales;

use Livewire\Component;

class VList extends Component
{
    public function render()
    {
        return view('livewire.n4.vales.v-list');
    }
    public function getDetails()
    {
    return redirect()->to(route("vales.detalles"));
    }
}
