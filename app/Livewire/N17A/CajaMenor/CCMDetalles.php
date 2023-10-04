<?php

namespace App\Livewire\N17A\CajaMenor;

use Livewire\Component;

use Livewire\Redirector;
use App\Models\CompraMenor;
use App\Models\CompraMenorList;
use Illuminate\Contracts\Support\Renderable;

class CCMDetalles extends Component
{

    public $details_of_folio = '';

    public function render()
    {
        return view('livewire.n17-a.caja-menor.c-c-m-detalles');
    }
}
