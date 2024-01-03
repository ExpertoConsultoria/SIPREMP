<?php

namespace App\Livewire\N2\ReportesCm;

use Livewire\Component;
use stdClass;

use App\Models\ReporteCM;
use App\Models\CompraMenor;
use App\Models\CompraMenorList;

use LivewireUI\Modal\ModalComponent;

class RCMDetails extends Component
{

    public $folio_report = '';

    public $report;
    public $fecha_creacion;
    public $montos = [];

    public function mount()
    {


        $this->report = ReporteCM::where('rcm_folio',$this->folio_report)->first();
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

        if($this->report->pending_review === 1){
            $this->report->pending_review = 0;
            $this->report->save();
        }

    }

    public function render()
    {
        return view('livewire.n2.reportes-cm.r-c-m-details');
    }
}
