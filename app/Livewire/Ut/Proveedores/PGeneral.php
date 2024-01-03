<?php

namespace App\Livewire\Ut\Proveedores;

use Livewire\Component;

use App\Models\proveedores_temporales;

class PGeneral extends Component
{

    public function render()
    {
        $allProveedores = proveedores_temporales::all();

        return view('livewire.Ut.Proveedores.p-general', compact('allProveedores'));
    }

    public function mount() {

    }


    public function getDetails( $id_proveedor ) {
        return redirect()->to(route("proveedores.detalles", ['id_proveedor'=>$id_proveedor]));
    }
}
