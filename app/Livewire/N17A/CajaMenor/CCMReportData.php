<?php

namespace App\Livewire\N17A\CajaMenor;

use Livewire\Component;
use stdClass;

use App\Models\ReporteCM;
use App\Models\CompraMenor;
use App\Models\CompraMenorList;

class CCMReportData extends Component
{

    public $id_of_report = '';

    public $report;
    public $fecha_creacion;
    public $montos = [];

    public function mount()
    {


        $this->report = ReporteCM::find($this->id_of_report);
        $this->fecha_creacion = date('F, Y', strtotime($this->report->created_at));

        for ($i=0; $i < 12 ; $i++) {
            $total_mes = 0.00;
            foreach ($this->report->rcm_folios_cm as $folio) {

                $compra_menor = CompraMenor::where('cm_folio',$folio)->first();
                $array_month = date("F", mktime(0, 0, 0, $i+1, 10));
                $folio_month = date("F", strtotime($compra_menor->cm_fecha));


                if($array_month === $folio_month){
                    $items = CompraMenorList::where('icm_folio',$folio)
                                ->where('icm_partida_presupuestal', $this->report->rcm_partida_presupuestal)
                                ->get();

                    foreach ($items as $item) {
                        $total_mes += $item->icm_importe;
                    }

                }

            }
            if($total_mes > 0){
                $month_data = new stdClass;
                    $month_data->month_name = $array_month;
                    $month_data->month_amount = number_format($total_mes, 2, '.', '');

                array_push($this->montos, $month_data);
            }
        }

    }

    public function render()
    {
        return view('livewire.n17-a.caja-menor.c-c-m-report-data');
    }
}
