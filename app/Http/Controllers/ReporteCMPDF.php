<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use stdClass;

use App\Models\ReporteCM;
use App\Models\CompraMenor;
use App\Models\CompraMenorList;

class ReporteCMPDF extends Controller{
    public function generatePDF($id_of_report)
    {
        // Datos del Reporte de Caja M
        $data = ReporteCM::where('id', $id_of_report)->first();
        $montos = [];

        for ($i=0; $i < 12 ; $i++) {
            $total_mes = 0.00;
            foreach ($data->rcm_folios_cm as $folio) {

                $compra_menor = CompraMenor::where('cm_folio',$folio)->first();
                $array_month = date("F", mktime(0, 0, 0, $i+1, 10));
                $folio_month = date("F", strtotime($compra_menor->cm_fecha));


                if($array_month === $folio_month){
                    $items = CompraMenorList::where('icm_folio',$folio)
                                ->where('icm_partida_presupuestal', $data->rcm_partida_presupuestal)
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

                array_push($montos, $month_data);
            }
        }

        // Estructura HTML
        $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->titulo = 'Reporte Caja Menor';
        $pdf->AddPage();
        $pdf->SetTopMargin(30);
        $pdf->SetAutoPageBreak(true, 10);
        $pdf->SetFont('helvetica', '', 10);

        $html = <<<EOF
            <style>
            .table {
                width: 100%;
            }

            .header {
                background-color: rgb(81, 81, 81);
                color: white;
            }

            .center {
                text-align: center;
            }

            .p-first {
                color: rgb(81, 81, 81);
                font-style: times;
                font-weight: bold;
                text-align: left;
            }

            .t-first {
                font-style: times;
                font-weight: bold;
                text-align: center;
            }

            .txt-first {
                font-style: times;
                font-weight: bold;
            }

            .p-second {
                color: rgb(83, 83, 83);
                font-size: medium;
                margin-top: none;
            }
            .m{
                margin-top: 0;
                text-justify: auto;
            }
            .txt{
                text-align: start;
            }
            </style>
            <div>
                <div>
                    <table>
                    <tr class="p-first">
                        <th>Periodo</th>
                        <th>Ejercicio</th>
                        <th>Área</th>
                        <th>Lugar</th>
                    </tr>
                    <tr class="p-second">
                        <td>{$data['rcm_inicio']} - {$data['rcm_fin']}</td>
                        <td>{$data['rcm_ejercicio']}</td>
                        <td>{$data['rcm_area']}</td>
                        <td>{$data['rcm_sucursal']}</td>
                    </tr>
                    </table>
                </div>

                <div>
                    <table>
                        <tr class="header t-first">
                            <th>Partida presupuestal</th>
                            <th>Ejercicio</th>
                            <th>Periodo</th>
                            <th>Cantidad</th>
                        </tr>
        EOF;

        foreach ($montos as $monto) {
            $html .= '
                <tr class="center p-second " >
                    <td>' . $data->rcm_partida_presupuestal . '</td>
                    <td>' . $data->rcm_ejercicio . '</td>
                    <td>' . $monto->month_name . '</td>
                    <td>$' . $monto->month_amount . '</td>
                </tr>
            ';
            $html .= '<tr class="center"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        }

        $html.=<<<EOF
                    </table>
                </div>

                <div>
                    <table>
                    <tr class="txt-first">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total General</th>
                    </tr>
                    <tr class="txt p-second">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>$ {$data['rcm_monto_gral']}</td>
                    </tr>
                    </table>
                </div>
            </div>
        EOF;

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output($data->rcm_folio . '.pdf', 'I');
    }
}
