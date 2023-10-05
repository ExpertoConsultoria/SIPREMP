<?php

namespace App\Livewire\N17A\CajaMenor;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\CompraMenor;

class CCMList extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $buscar = '';
    public $ordenar = 'cm_folio';
    public $direccion='asc';

    public function ordenaPor($ordenar) {    // Ordena la columna seleccionada de la tabla
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

    public function loadDrafts() {     // Indica cuando esta lista la carga de los componentes
        $this->cargarLista = true;
    }

    public function render()
    {

        $compras = [];

        if($this->cargarLista){

            $compras = CompraMenor::select('id','cm_fecha','cm_folio','cm_asunto','cm_creation_status')
                ->where('cm_creation_status','Enviado')
                ->where('cm_asunto','like','%'.$this->buscar.'%')
                ->orderby($this->ordenar, $this->direccion)
                ->paginate($this->mostrar);

        }
        return view('livewire.n17-a.caja-menor.c-c-m-list',compact('compras'));
    }

    public function getDetails($compra)
    {
        return redirect()->to(route("cajamenor.create", ['details_of_folio'=>$compra['cm_folio']]));
    }

    public function goToEdit($compra)
    {
        return redirect()->to(route("cajamenor.create", ['edit_to_folio'=>$compra['cm_folio']]));
    }
}
