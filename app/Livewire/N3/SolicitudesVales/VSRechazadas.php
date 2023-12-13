<?php

namespace App\Livewire\N3\SolicitudesVales;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

use App\Models\Vales_compra;
use App\Models\Memorandum;
use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class VSRechazadas extends Component
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

            $vales = Vales_compra::select('fecha','folio','justificacion','creation_status','id_usuario')
                ->where('justificacion','like','%'.$this->buscar.'%')
                ->where('creation_status','Rechazado')
                ->where('pass_filter',0)
                ->whereNull('token_rev_val')
                ->whereNull('token_disp_ppta')
                ->whereNull('token_autorizacion')
                ->whereNotNull('token_solicitante')
                ->whereNotNull('motivo_rechazo')
                ->get();

            foreach ($vales as $vale) {
                if($vale->solicitante->hasAnyRole(['N7:GS:17A', 'N6:17A', 'N5:18A:F'])){
                    array_push($filtrados, $vale);
                }
            }

            $rechazadas = Collection::make($filtrados);

            $page = 0;
            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

            $rechazadas = $rechazadas->sortBy([$this->ordenar, $this->direccion]);
            $rechazadas = new LengthAwarePaginator($rechazadas->forPage($page, $this->mostrar), $rechazadas->count(), $this->mostrar, $page);

        }

        return view('livewire.n3.solicitudes-vales.v-s-rechazadas',compact('rechazadas'));
    }

    public function getDetails($vale)
    {
        return redirect()->to(route("vales-solicitudes.details", ['details_of_folio'=>$vale['folio']]));
    }
}
