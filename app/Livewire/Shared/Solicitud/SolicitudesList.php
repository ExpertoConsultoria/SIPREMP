<?php

namespace App\Livewire\Shared\Solicitud;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Memorandum;
use App\Models\MemorandumList;
use Illuminate\Support\Facades\Auth;

use App\Helpers\Helper;
use Livewire\Attributes\On;

class SolicitudesList extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $buscar = '';
    public $ordenar = 'memo_folio';
    public $direccion='asc';

    public $backButton;

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

    public function loadDrafts() {
        $this->cargarLista = true;
    }

    public function render()
    {

        $memorandums = [];

        if($this->cargarLista){
            $memorandums = Memorandum::select('id','memo_fecha','memo_folio','memo_asunto','memo_creation_status')
            ->where('memo_creation_status','not like','Borrador')
            ->where('solicitante_id', Auth::user() -> id)
            ->where('memo_asunto','like','%'.$this->buscar.'%')
            ->orderby($this->ordenar, $this->direccion)
            ->paginate($this->mostrar);
        }
        $this -> backButton = Helper::backButton();
        return view('livewire.shared.solicitud.solicitudes-list', compact('memorandums'));
    }

    public function getDetails($memorandum)
    {
        return redirect()->to(route("solicitudes.show", ['details_of_folio'=>$memorandum['memo_folio']]));
    }

    #[On('deleteDraft')]
    public function deleteDraft($id) {
        $memorandum = Memorandum::findOrFail($id);
        $allItems = MemorandumList::where('im_folio',$memorandum->memo_folio)->get();

        foreach ($allItems as $item) {
            $item->delete();
        }
        $memorandum->delete();
        $this->dispatch('alertCRUD',
            '¡Solicitud Eliminada!',
            'La Solicitud ha sido elimnada',
            'success'
        );
    }

    public function goToEdit($memorandum)
    {
        return redirect()->to(route("solicitudes.edit", ['edit_to_folio'=>$memorandum['memo_folio']]));
    }

}
