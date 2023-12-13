<?php

namespace App\Livewire\Shared\BandejaEntrada;

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

class BEPendientes extends Component
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

    public function loadPending() {     // Indica cuando esta lista la carga de los componentes
        $this->cargarLista = true;
    }

    public function render()
    {
        $pendientes = [];
        if($this->cargarLista){

            $filtrados = [];

            if(Auth::user()->hasRole('N5:18A:F')){

                $memorandums = Memorandum::select('memo_fecha', 'memo_folio', 'memo_asunto', 'memo_creation_status', 'solicitante_id')
                    ->where('memo_asunto', 'like', '%' . $this->buscar . '%')
                    ->where('memo_creation_status', 'Enviado')
                    ->where('pass_filter', 0)
                    ->whereNull('token_aceptacion')
                    ->whereNull('motivo_rechazo')
                    ->get();

                foreach ($memorandums as $memorandum) {
                    if ($memorandum->solicitante->hasAnyRole(['N6:17A', 'N7:GS:17A'])) {
                        array_push($filtrados, $memorandum);
                    }
                }

                $pendientes = Collection::make($filtrados);

                $page = 0;
                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

                $pendientes = $pendientes->sortBy([$this->ordenar, $this->direccion]);
                $pendientes = new LengthAwarePaginator($pendientes->forPage($page, $this->mostrar), $pendientes->count(), $this->mostrar, $page);

            } elseif (Auth::user()->hasRole('N4:SEGE')){

                $memorandums = Memorandum::select('memo_fecha','memo_folio','memo_asunto','memo_creation_status','solicitante_id','destinatario')
                    ->where('memo_asunto','like','%'.$this->buscar.'%')
                    ->where('memo_creation_status','Validado')
                    ->where('pass_filter',1)
                    ->whereNull('token_aceptacion')
                    ->whereNull('motivo_rechazo')
                    ->get();

                foreach ($memorandums as $memorandum) {
                    if($memorandum->solicitante->hasAnyRole(['N6:17A', 'N7:GS:17A', 'N5:18A:F'])&& $memorandum->destinatario === "Servicos Generales"){
                        array_push($filtrados, $memorandum);
                    }
                }

                $pendientes = Collection::make($filtrados);

                $page = 0;
                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

                $pendientes = $pendientes->sortBy([$this->ordenar, $this->direccion]);
                $pendientes = new LengthAwarePaginator($pendientes->forPage($page, $this->mostrar), $pendientes->count(), $this->mostrar, $page);
            } elseif (Auth::user()->hasRole('N3:UNTE')){

                $vales = Vales_compra::select('fecha','folio','justificacion','creation_status','id_usuario')
                    ->where('justificacion','like','%'.$this->buscar.'%')
                    ->where('creation_status','Enviado')
                    ->where('pass_filter',0)
                    ->whereNull('motivo_rechazo')
                    ->whereNull('token_rev_val')
                    ->whereNull('token_disp_ppta')
                    ->whereNull('token_autorizacion')
                    ->whereNotNull('token_solicitante')
                    ->get();

                foreach ($vales as $vale) {
                    if($vale->solicitante->hasAnyRole(['N6:17A', 'N7:GS:17A', 'N5:18A:F','N4:SEGE'])){
                        array_push($filtrados, $vale);
                    }
                }

                $pendientes = Collection::make($filtrados);

                $page = 0;
                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

                $pendientes = $pendientes->sortBy([$this->ordenar, $this->direccion]);
                $pendientes = new LengthAwarePaginator($pendientes->forPage($page, $this->mostrar), $pendientes->count(), $this->mostrar, $page);
            }

        }

        return view('livewire.shared.bandeja-entrada.b-e-pendientes',compact('pendientes'));
    }

    public function getDetails($data)
    {
        if(Auth::user()->hasRole('N5:18A:F')){
            return redirect()->to(route("bandejaentrada.details", ['details_of_folio'=>$data['memo_folio']]));
        } elseif(Auth::user()->hasRole('N4:SEGE')){
            return redirect()->to(route("bandejaentrada.advanced-details", ['details_of_folio'=>$data['memo_folio']]));
        } elseif(Auth::user()->hasRole('N3:UNTE')){
            return redirect()->to(route("bandejaentrada.valeServicio", ['details_of_folio'=>$data['folio']]));
        }
    }
}
