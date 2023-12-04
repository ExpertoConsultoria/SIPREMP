<?php

namespace App\Livewire\Ut\Proveedores;

use Livewire\Component;
use App\Models\proveedores_temporales;
use App\Models\Vales_compra;

class PDetalles extends Component
{
    public $id_proveedor;
    public $proveedor;
    public function render()
    {
        return view('livewire.ut.proveedores.p-detalles');
    }
    public function mount() {
        $this -> proveedor = proveedores_temporales::find($this -> id_proveedor);
        $this -> valesByProveedor = Vales_compra::where('id_proveedor', $this -> id_proveedor);
    }

    public function autorizarProveedor( $id_proveedor ) {
        dd($id_proveedor);
    }
    public function rechazarProveedor( $id_proveedor ) {
        dd($id_proveedor);
    }
}
