<?php

namespace App\Livewire\N17A\CajaMenor;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\PptoDeEgreso;
use App\Models\CompraMenor;
use App\Models\CompraMenorList;

class CCMList extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $ordenar = 'cm_folio';
    public $direccion='asc';

    public $fecha_inicio;
    public $fecha_fin;
    public $ejercicio;
    public $partida_especifica; //Para el buscador
    public $partida_presupuestal; //Para la consulta

    public $ejercicios = [];

    protected function rules() {
        return [
            'fecha_inicio'   => 'required | date',
            'fecha_fin'   => 'required | date',
            'ejercicio'   => 'required',
            'partida_presupuestal'   => 'required',
        ];
    }

    protected $messages = [
        'fecha_inicio.required' => 'Este campo es Obligatorio.',
        'fecha_inicio.date' => 'No es una fecha valida.',
        'fecha_fin.required' => 'Este campo es Obligatorio.',
        'fecha_fin.date' => 'No es una fecha valida.',
        'ejercicio.required' => 'Este campo es Obligatorio.',
        'partida_presupuestal.required' => 'Este campo es Obligatorio.',
    ];

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

    public function loadList() {     // Indica cuando esta lista la carga de los componentes
        $this->cargarLista = true;
    }

    public function mount()
    {
        $this->fecha_inicio = date('Y-m-1');
        $this->fecha_fin = date('Y-m-t');

        $this->ejercicio = '';
        $this->partida_especifica = '';
        $this->partida_presupuestal = '';

        $this->ejercicios = ['2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030'];
    }

    public function render()
    {
        $compras_enviadas = [];
        $partidas_presupuestales = [];

        if($this->cargarLista){
            $partidas_presupuestales = PptoDeEgreso::where('PartidaEspecifica','like','%'.$this->partida_especifica.'%')->get();


            if($this->partida_presupuestal == ''){
                $compras_enviadas = CompraMenor::select('id','cm_fecha','cm_folio','cm_asunto','cm_creation_status')
                                                ->where('cm_creation_status', 'Enviado')
                                                ->whereBetween('cm_fecha', [$this->fecha_inicio, $this->fecha_fin])
                                                ->where('cm_folio','like','%'.$this->ejercicio.'%')
                                                ->orderby($this->ordenar, $this->direccion)
                                                ->paginate($this->mostrar);
            }else{

                $objetos_cmm = CompraMenorList::where('icm_partida_presupuestal',$this->partida_presupuestal)->get();
                $folios = [];
                $compras_by_folio = [];

                foreach ($objetos_cmm as $objeto) {
                    if (!in_array($objeto->icm_folio, $folios, true)) {
                        array_push($folios, $objeto->icm_folio);
                    }
                }

                $compras_enviadas = CompraMenor::select('id','cm_fecha','cm_folio','cm_asunto','cm_creation_status')
                                                ->where('cm_creation_status', 'Enviado')
                                                ->whereBetween('cm_fecha', [$this->fecha_inicio, $this->fecha_fin])
                                                ->where('cm_folio','like','%'.$this->ejercicio.'%')
                                                ->get();

                foreach ($compras_enviadas as $compra) {
                    foreach ($folios as $folio) {
                        if($compra->cm_folio == $folio){
                            array_push($compras_by_folio, $compra);
                        }
                    }
                }
                $compras_enviadas = Collection::make($compras_by_folio);

                $page = 0;
                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

                $compras_enviadas = $compras_enviadas->sortBy([$this->ordenar, $this->direccion]);
                $compras_enviadas = new LengthAwarePaginator($compras_enviadas->forPage($page, $this->mostrar), $compras_enviadas->count(), $this->mostrar, $page);
            }

        }

        return view('livewire.n17-a.caja-menor.c-c-m-list',compact(['compras_enviadas','partidas_presupuestales']));
    }

    public function getDetails($compra)
    {
        return redirect()->to(route("cajamenor.show", ['details_of_folio'=>$compra['cm_folio']]));
    }

    public function printData($compra)
    {
        return redirect()->to(route("cajamenor.print", ['print_folio'=>$compra['cm_folio']]));
    }

    public function forgeReport($compras_filtradas){

        $this->validate();

        dd($compras_filtradas);

    }

}
