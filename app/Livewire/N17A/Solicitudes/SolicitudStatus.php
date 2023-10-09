<?php

namespace App\Livewire\N17A\Solicitudes;

use Livewire\Component;

use Livewire\Redirector;
use App\Models\Memorandum;
use App\Models\MemorandumList;

use Illuminate\Contracts\Support\Renderable;

class SolicitudStatus extends Component
{

    public $details_of_folio = '';

    public function render()
    {
        return view('livewire.n17-a.solicitudes.solicitud-status');
    }
}
