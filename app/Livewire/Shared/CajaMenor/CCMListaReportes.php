<?php

namespace App\Livewire\Shared\CajaMenor;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\ReporteCM;

class CCMListaReportes extends Component
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

            $reports = ReporteCM::select('id','rcm_ejercicio','rcm_inicio','rcm_fin','rcm_partida_presupuestal')
                ->where('rcm_inicio','like','%'.$this->buscar.'%')
                ->orWhere('rcm_fin','like','%'.$this->buscar.'%')
                ->orderby($this->ordenar, $this->direccion)
                ->paginate($this->mostrar);
        }
        return view('livewire.shared.caja-menor.c-c-m-lista-reportes',compact('reports'));
    }

    #[On('deleteReport')]
    public function deleteReport($id){
        $report = ReporteCM::findOrFail($id);
        $report->delete();

        $this->dispatch('alertCRUD',
            '!Reporte #'.$id.' Eliminado!',
            'El reporte ha sido elimnado',
            'success'
        );
    }

    public function reportDetails($reporte)
    {
        return redirect()->to(route("cajamenor.reportData", ['id_of_report' => $reporte['id']]));

        // return redirect()->to(route("cajamenor.edit", ['edit_to_folio'=>$compra['cm_folio']]));
    }
}
