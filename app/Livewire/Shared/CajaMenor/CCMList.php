<?php

namespace App\Livewire\Shared\CajaMenor;

use App\Helpers\Helper;
use App\Models\CompraMenor;
use App\Models\CompraMenorList;
use App\Models\PptoDeEgreso;
use App\Models\ReporteCM;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class CCMList extends Component
{
    use WithPagination;

    public $cargarLista = true;
    public $mostrar = '10';
    public $ordenar = 'cm_folio';
    public $direccion = 'asc';

    public $fecha_inicio;
    public $fecha_fin;
    public $ejercicio;
    public $partida_presupuestal; //Para la consulta
    public $compras_filtradas = []; //Para el buscador
    public $folios_filtrados = []; //Para el buscador

    public $ejercicios = [];

    protected function rules()
    {
        return [
            'fecha_inicio' => 'required | date',
            'fecha_fin' => 'required | date',
            'ejercicio' => 'required',
            'partida_presupuestal' => 'required',
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

    public function ordenaPor($ordenar)
    { // Ordena la columna seleccionada de la tabla
        if ($this->ordenar == $ordenar) {
            if ($this->direccion == 'desc') {
                $this->direccion = 'asc';
            } else {
                $this->direccion = 'desc';
            }

        } else {
            $this->direccion = 'asc';
            $this->ordenar = $ordenar;
        }
    }

    public function loadList()
    { // Indica cuando esta lista la carga de los componentes
        $this->cargarLista = true;
    }

    public function mount()
    {
        $this->fecha_inicio = date('Y-m-01');
        $this->fecha_fin = date('Y-m-t');

        $this->ejercicio = date('Y');
        // $this->partida_especifica = '';
        $this->partida_presupuestal = '';

        $this->ejercicios = ['2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030'];
    }

    public function render()
    {
        $compras_enviadas = [];
        $partidas_presupuestales = [];

        if ($this->cargarLista) {
            // $partidas_presupuestales = PptoDeEgreso::where('PartidaEspecifica','like','%'.$this->partida_especifica.'%')->get();
            $partidas_presupuestales = PptoDeEgreso::all();

            if ($this->partida_presupuestal == '') {
                $compras_enviadas = CompraMenor::select('id', 'cm_fecha', 'cm_folio', 'cm_asunto', 'cm_creation_status')
                    ->where('cm_creation_status', 'Enviado')
                    ->whereBetween('cm_fecha', [$this->fecha_inicio, $this->fecha_fin])
                    ->where('cm_folio', 'like', '%' . $this->ejercicio . '%')
                    ->orderby($this->ordenar, $this->direccion)
                    ->paginate($this->mostrar);

            } else {

                $objetos_cmm = CompraMenorList::where('icm_partida_presupuestal', $this->partida_presupuestal)->get();
                $folios = [];
                $compras_by_folio = [];

                foreach ($objetos_cmm as $objeto) {
                    if (!in_array($objeto->icm_folio, $folios, true)) {
                        array_push($folios, $objeto->icm_folio);
                    }
                }


                $compras_enviadas = CompraMenor::select('id', 'cm_fecha', 'cm_folio', 'cm_asunto', 'cm_creation_status')
                    ->where('cm_creation_status', 'Enviado')
                    ->whereBetween('cm_fecha', [$this->fecha_inicio, $this->fecha_fin])
                    ->where('cm_folio', 'like', '%' . $this->ejercicio . '%')
                    ->get();

                $this->folios_filtrados = [];

                foreach ($compras_enviadas as $compra) {
                    foreach ($folios as $folio) {
                        if ($compra->cm_folio == $folio) {
                            array_push($compras_by_folio, $compra);
                            array_push($this->folios_filtrados, $compra->cm_folio);
                        }
                    }
                }
                $this->compras_filtradas = $compras_by_folio;

                $compras_enviadas = Collection::make($compras_by_folio);

                $page = 0;
                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

                $compras_enviadas = $compras_enviadas->sortBy([$this->ordenar, $this->direccion]);
                $compras_enviadas = new LengthAwarePaginator($compras_enviadas->forPage($page, $this->mostrar), $compras_enviadas->count(), $this->mostrar, $page);
            }

        }

        return view('livewire.shared.caja-menor.c-c-m-list', compact(['compras_enviadas', 'partidas_presupuestales']));
    }

    public function getDetails($compra)
    {
        return redirect()->to(route("cajamenor.show", ['details_of_folio' => $compra['cm_folio']]));
    }

    public function printData($compra)
    {
        return redirect()->to(route("cajamenor.print", ['print_folio' => $compra['cm_folio']]));
    }

    public function forgeReport()
    {

        $this->validate();

        $monto_general = 0;
        $userSede = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->SedeNombre;
        $userArea = is_string(Helper::GetUserArea()) ? Helper::GetUserArea() : Helper::GetUserArea()->AreaNombre;

        foreach ($this->folios_filtrados as $folio) {
            $items = CompraMenorList::where('icm_folio', $folio)
                ->where('icm_partida_presupuestal', $this->partida_presupuestal)
                ->get();

            foreach ($items as $item) {
                $monto_general += $item->icm_importe;
            }

        }

        $monto_general = number_format($monto_general, 2, '.', '');

        $reporte = new ReporteCM();
        $reporte->rcm_ejercicio = $this->ejercicio;
        $reporte->rcm_inicio = $this->fecha_inicio;
        $reporte->rcm_fin = $this->fecha_fin;
        $reporte->rcm_partida_presupuestal = $this->partida_presupuestal;
        $reporte->rcm_folios_cm = $this->folios_filtrados;
        $reporte->rcm_area = $userArea;
        $reporte->rcm_sucursal = $userSede;
        $reporte->rcm_monto_gral = $monto_general;
        $reporte->save();

        return redirect()->to(route("cajamenor.reportData", ['id_of_report' => $reporte->id]));

    }

}
