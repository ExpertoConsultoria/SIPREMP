<?php

namespace App\Livewire\N4\Vales;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Models\Vales_compra;
use App\Models\Elementos_Vale_compra;
use Illuminate\Support\Facades\Auth;

class VAprobados extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $buscar = '';
    public $ordenar = 'folio';
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

    public function loadApproved() {
        $this->cargarLista = true;
    }

    public function render()
    {

        $vales = [];

        if($this->cargarLista){
            $vales = Vales_compra::select('id','folio','fecha','justificacion','id_usuario')
                ->where('justificacion','like','%'.$this->buscar.'%')
                ->where('creation_status','Aprobado')
                ->where('pass_filter',1)
                ->where('pass_cp',1)
                ->whereNull('motivo_rechazo')
                ->whereNotNull('token_solicitante')
                ->whereNotNull('token_rev_val')
                ->whereNotNull('token_disp_ppta')
                ->whereNotNull('token_autorizacion')
                ->orderby($this->ordenar, $this->direccion)
                ->paginate($this->mostrar);
        }
        return view('livewire.n4.vales.v-aprobados',compact('vales'));
    }

    public function getDetails($vale)
    {
    return redirect()->to(route("vales.approved-details", ['details_of_folio'=>$vale['folio']]));
    }
    public function getAdd($vale)
    {
    return redirect()->to(route("vales.add-to-approved", ['details_of_folio'=>$vale['folio']]));
    }
    public function getPrint($vale)
    {
    return redirect()->to(route("vales.print-approved", ['details_of_folio'=>$vale['folio']]));
    }
    public function getExpe($vale)
    {
        return redirect()->to(route("vales.expediente", ['details_of_folio'=>$vale['folio']]));
    }
}
