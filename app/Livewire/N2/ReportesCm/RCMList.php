<?php

namespace App\Livewire\N2\ReportesCm;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

use App\Models\ReporteCM;
use App\Models\User;

class RCMList extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $buscar = '';
    public $ordenar = 'id';
    public $direccion='asc';

       protected $listeners = ['deleteReport']; // metodo usado con evento -emitTo- delete para eliminar

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

    public function loadReports() {     // Indica cuando esta lista la carga de los componentes
        $this->cargarLista = true;
    }

    public function render()
    {

        $reports = [];

        if($this->cargarLista){

            $reports = ReporteCM::select('id','rcm_folio','rcm_ejercicio','rcm_inicio','rcm_fin','rcm_partida_presupuestal', 'rcm_area')
                ->where('has_been_sent', 1)
                ->where('rcm_inicio','like','%'.$this->buscar.'%')
                ->orderby($this->ordenar, $this->direccion)
                ->paginate($this->mostrar);
        }
        return view('livewire.n2.reportes-cm.r-c-m-list',compact('reports'));
    }

    public function reportDetails($reporte)
    {
        return redirect()->to(route("reportescajamenor.reportData", ['folio_report' => $reporte['rcm_folio']]));
    }
}
