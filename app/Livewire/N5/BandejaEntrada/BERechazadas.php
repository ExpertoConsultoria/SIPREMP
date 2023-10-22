<?php

namespace App\Livewire\N5\BandejaEntrada;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

use App\Models\Memorandum;
use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class BERechazadas extends Component
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

    public function loadRejected() {     // Indica cuando esta lista la carga de los componentes
        $this->cargarLista = true;
    }

    public function render()
    {

        $rechazadas = [];

        if($this->cargarLista){
            $filtrados = [];

            $memorandums = Memorandum::select('memo_fecha','memo_folio','memo_asunto','memo_creation_status','solicitante_id')
                ->where('memo_asunto','like','%'.$this->buscar.'%')
                ->where('memo_creation_status','Rechazado')
                ->whereNotNull('motivo_rechazo')
                ->whereNull('token_aceptacion')
                ->get();

            foreach ($memorandums as $memorandum) {
                if($memorandum->solicitante->roles[0]->name === 'N7:GS:17A' || $memorandum->solicitante->roles[0]->name === 'N6:17A'){
                    array_push($filtrados, $memorandum);
                }
            }

            $rechazadas = Collection::make($filtrados);

            $page = 0;
            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

            $rechazadas = $rechazadas->sortBy([$this->ordenar, $this->direccion]);
            $rechazadas = new LengthAwarePaginator($rechazadas->forPage($page, $this->mostrar), $rechazadas->count(), $this->mostrar, $page);
        }

        return view('livewire.n5.bandeja-entrada.b-e-rechazadas',compact('rechazadas'));
    }

    public function getDetails($memorandum)
    {
    return redirect()->to(route("bandejaentrada.rechazada", ['details_of_folio'=>$memorandum['memo_folio']]));
    }
}
