<?php

namespace App\Livewire\N17A\Solicitudes;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Memorandum;
use Illuminate\Support\Facades\Auth;

class SolicitudList extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $buscar = '';
    public $ordenar = 'memo_folio';
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

        $memorandums = [];

        if($this->cargarLista){
            $memorandums = Memorandum::select('id','memo_fecha','memo_folio','memo_asunto','memo_creation_status')
                ->where('memo_creation_status','not like','Borrador')
                ->where('solicitante_id', Auth::user() -> id)
                ->where('memo_asunto','like','%'.$this->buscar.'%')
                ->orderby($this->ordenar, $this->direccion)
                ->paginate($this->mostrar);
        }
        return view('livewire.n17-a.solicitudes.solicitud-list',compact('memorandums'));
    }

    public function getDetails($memorandum)
    {
        return redirect()->to(route("solicitudes.show", ['details_of_folio'=>$memorandum['memo_folio']]));
    }

    public function goToEdit($memorandum)
    {
        return redirect()->to(route("solicitudes.edit", ['edit_to_folio'=>$memorandum['memo_folio']]));
    }
}
