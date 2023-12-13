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
        $valesInventario = Vales_entrada_material::all();
        foreach($valesInventario as $vale) {
            // $valesInventario -> items = Materiales_recibidos::where('folio', $vale -> folio);
        }
        return view('livewire.n4.inventario.i-inventario');
    }

    public function mount() {

    }
}
