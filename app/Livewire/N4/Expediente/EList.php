<?php

namespace App\Livewire\N4\Expediente;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;

class EList extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $buscar = '';
    public $ordenar = 'exp_folio';
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

    public function loadExpedients() {
        $this->cargarLista = true;
    }

    public function render()
    {

        $expedients = [];

        if($this->cargarLista){
            $expedients = Expediente::select('id','exp_folio','fecha','concepto')
                ->where('concepto','like','%'.$this->buscar.'%')
                ->orderby($this->ordenar, $this->direccion)
                ->paginate($this->mostrar);
        }
        return view('livewire.n4.expediente.e-list',compact('expedients'));
    }

    public function getDetails($expedient)
    {
        return redirect()->to(route("expediente.detalles", ['details_of_folio'=>$expedient['exp_folio']]));
    }
}
