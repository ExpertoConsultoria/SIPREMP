<?php

namespace App\Livewire\N3\ComprasConsolidades;

use Livewire\Component;

use App\Models\compra_consolidada;
use App\Models\item_compra_consolidada;
use Illuminate\Support\Facades\Auth;


class CSCompraConsolidadaBorrador extends Component
{

    public $comprasConsolidadas = [];
    public $user;
    public function render()
    {
        return view('livewire.n3.compras-consolidades.c-s-compra-consolidada-borrador');
    }

    public function mount() {
        $this->user = Auth::user();
        $this->comprasConsolidadas = compra_consolidada::where('estado', 'Borrador')->get();
    }

    public function editBorrador( $compra ) {
        return redirect()->to(route('compraConsolidada.editBorrador', ['folioToEdit' => $compra['folio']]));
    }
}
