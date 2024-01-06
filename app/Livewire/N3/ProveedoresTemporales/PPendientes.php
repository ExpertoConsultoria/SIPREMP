<?php

namespace App\Livewire\N3\ProveedoresTemporales;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

use App\Models\proveedores_temporales;

class PPendientes extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $buscar = '';
    public $ordenar = 'RazonSocial';
    public $direccion='asc';

    public function ordenaPor($ordenar) {
        if($this->ordenar==$ordenar){
            if($this->direccion == 'desc')
                $this->direccion = 'asc';
            else
                $this->direccion = 'desc';
        }
        else{
            $this->direccion = 'asc';
            $this->ordenar = $ordenar;
        }
    }

    public function loadPending() {
        $this->cargarLista = true;
    }

    public function render()
    {
        $temporary_list = [];

        if($this->cargarLista){
            $temporary_list = proveedores_temporales::select('id','Nombre', 'RazonSocial', 'Persona', 'RFC', 'Telefono')
            ->where('RazonSocial','like','%'.$this->buscar.'%')
            ->orderby($this->ordenar, $this->direccion)
            ->paginate($this->mostrar);
        }

        return view('livewire.n3.proveedores-temporales.p-pendientes', compact('temporary_list'));
    }

    public function mount() {

    }


    public function getDetails( $id_proveedor ) {
        return redirect()->to(route("proveedores.detalles", ['id_proveedor'=>$id_proveedor]));
    }
}
