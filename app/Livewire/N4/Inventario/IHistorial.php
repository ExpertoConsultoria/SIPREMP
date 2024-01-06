<?php

namespace App\Livewire\N4\Inventario;

use Livewire\Component;
use App\Models\ValeSalidaMateriales;
use App\Models\MaterialesEntregados;
class IHistorial extends Component
{
    public $vales_salida = [];
    public $items_vale_salida = [];

    public function render()
    {
        $this->vales_salida = ValeSalidaMateriales::all();
        $this->items_vale_salida = MaterialesEntregados::all();

        foreach ($this->vales_salida as $vale) {
            $vale->items = MaterialesEntregados::where('folio_vale_salida', $vale->folio)->get();
            $vale->totalCantidad = $vale->items->sum('cantidad');
        }
        return view('livewire.n4.inventario.i-historial');
    }

    public function mount() {

    }

    public function registroDetail( $folio ) {
        return redirect()->to(route("inventario.detalles", ['folio' => $folio['folio_vale_salida']]));
    }
}
