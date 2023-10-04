<?php

namespace App\Livewire\N17A\CajaMenor;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Models\CompraMenor;
use App\Models\CompraMenorList;

class CCMBorradores extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $buscar = '';
    public $ordenar = 'cm_folio';
    public $direccion='asc';

       protected $listeners = ['deleteDraft']; // metodo usado con evento -emitTo- delete para eliminar

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

        $drafts = [];

        if($this->cargarLista){

            $drafts = CompraMenor::select('id','cm_folio','cm_fecha','cm_asunto')
                ->where('cm_creation_status','Borrador')
                ->where('cm_asunto','like','%'.$this->buscar.'%')
                ->orderby($this->ordenar, $this->direccion)
                ->paginate($this->mostrar);

        }

        return view('livewire.n17-a.caja-menor.c-c-m-borradores',compact('drafts'));
    }

    #[On('deleteDraft')]
    public function deleteDraft($id){
        $compra_menor = CompraMenor::findOrFail($id);
        $allItems = CompraMenorList::where('icm_folio',$compra_menor->cm_folio)->get();

        foreach ($allItems as $item) {
            $item->delete();
        }
        $compra_menor->delete();
        $this->dispatch('simpleAlert',
            title: '¡Solicitud Eliminada!',
            message: 'El borrador ha sido elimnado',
            icon: 'success'
        );
    }

    public function goToEdit($compra)
    {
        return redirect()->to(route("cajamenor.edit", ['edit_to_folio'=>$compra['cm_folio']]));
    }
}
