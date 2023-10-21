<?php

namespace App\Livewire\N6\BienesServ;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

use App\Models\Memorandum;

class Lista extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $buscar = '';
    public $ordenar = 'memo_folio';
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
        return view('livewire.n6.bienes-serv.lista',compact('memorandums'));
    }

    public function getDetails($memorandum)
    {
        return redirect()->to(route("solicitudBienes.show", ['details_of_folio'=>$memorandum['memo_folio']]));
    }

    public function goToEdit($memorandum)
    {
        return redirect()->to(route("solicitudBienes.edit", ['edit_to_folio'=>$memorandum['memo_folio']]));
    }

}
