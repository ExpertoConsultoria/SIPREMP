<?php

namespace App\Livewire\N6\BienesServ;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Models\Memorandum;
use App\Models\MemorandumList;
use Illuminate\Support\Facades\Auth;


class Borradores extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $buscar = '';
    public $ordenar = 'memo_folio';
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

            $drafts = Memorandum::select('id','memo_folio','memo_fecha','memo_asunto')
                ->where('memo_creation_status','Borrador')
                ->where('solicitante_id', Auth::user() -> id)
                ->where('memo_asunto','like','%'.$this->buscar.'%')
                ->orderby($this->ordenar, $this->direccion)
                ->paginate($this->mostrar);

        }
        return view('livewire.n6.bienes-serv.borradores', compact('drafts'));
    }


    #[On('deleteDraft')]
    public function deleteDraft($id){
        $memorandum = Memorandum::findOrFail($id);
        $allItems = MemorandumList::where('im_folio',$memorandum->memo_folio)->get();

        foreach ($allItems as $item) {
            $item->delete();
        }
        $memorandum->delete();
        $this->dispatch('simpleAlert',
            title: '¡Solicitud Eliminada!',
            message: 'El borrador ha sido elimnado',
            icon: 'success'
        );
    }

    public function goToEdit($memorandum)
    {
        return redirect()->to(route("solicitudBienes.edit", ['edit_to_folio'=>$memorandum['memo_folio']]));
    }

}
