<?php

namespace App\Livewire\N3\ComprasConsolidades;

use Livewire\Component;

use App\Models\compra_consolidada;
use App\Models\item_compra_consolidada;



class CSCompraConsolidadaGuardado extends Component
{
    public $comprasConsolidadas = [];

    public function render()
    {
        return view('livewire.n3.compras-consolidades.c-s-compra-consolidada-guardado');
    }

    public function mount() {
        $this -> comprasConsolidadas = compra_consolidada::where('estado', 'Enviado') -> get();
    }

    
    public function getDetails($compra)
    {
        return redirect()->to(route("compraConsolidada.detalles", ['folio' => $compra['folio']]));
    }
}
