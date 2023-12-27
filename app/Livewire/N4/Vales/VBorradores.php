<?php

namespace App\Livewire\N4\Vales;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Models\Vales_compra;
use App\Models\Elementos_Vale_compra;
use Illuminate\Support\Facades\Auth;

class VBorradores extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $buscar = '';
    public $ordenar = 'folio';
    public $direccion='asc';

    protected $listeners = ['deleteDraft'];

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

    public function loadDrafts() {     // Indica cuando esta lista la carga de los componentes
        $this->cargarLista = true;
    }

    public function render()
    {

        $drafts = [];

        if($this->cargarLista){
            $drafts = Vales_compra::select('id','folio','fecha','justificacion','id_usuario')
                ->where('creation_status','Borrador')
                // ->where('id_usuario', Auth::user()->id)
                ->where('justificacion','like','%'.$this->buscar.'%')
                ->orderby($this->ordenar, $this->direccion)
                ->paginate($this->mostrar);
        }
        return view('livewire.n4.vales.v-borradores', compact('drafts'));
    }

    #[On('deleteDraft')]
    public function deleteDraft($id) {
        $vale = Vales_compra::findOrFail($id);
        $allItems = Elementos_Vale_compra::where('id',$vale->id)->get();

        foreach ($allItems as $item) {
            $item->delete();
        }
        $vale->delete();
        $this->dispatch('alertCRUD',
            'Vale de Compra Eliminado!',
            'El borrador ha sido eliminado',
            'success'
        );
    }

    public function goToEdit($vale)
    {
        return redirect()->to(route("vales.edit", ['edit_to_folio'=>$vale['folio']]));
    }

}
