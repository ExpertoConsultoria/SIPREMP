<?php

namespace App\Livewire\N4\Inventario;

use Livewire\Component;
use App\Models\Vales_entrada_material;
use App\Models\Materiales_recibidos;

use stdClass;
class IInventario extends Component
{
    public $valesInventario = [];

    public function render()
    {
        $this->valesInventario = Vales_entrada_material::all();

        foreach ($this->valesInventario as $vale) {
            $vale->items = Materiales_recibidos::where('folio_vale_entrada', $vale->folio)->get();
            $vale->totalCantidad = $vale->items->sum('cantidad');
        }
        
        return view('livewire.n4.inventario.i-inventario');
    }

    public function mount() {

    }

    public function registroDetail( $folio ) {
        return redirect()->to(route("inventario.detalles", ['folio' => $folio['folio']]));
    }
}
