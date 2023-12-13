<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReporteCM;

class ReporteCMPDF extends Controller{
    public function generatePDF($id_of_report)
    {
        $data = ReporteCM::where('id', $id_of_report)->first();
        
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
        <th>Periodo</th>
        <th>Partida presupuestal</th>
        <th>Cantidad</th>
      </tr>
      <tr class="center p-second">
        <td>{$data['rcm_inicio']} - {$data['rcm_fin']}</td>
        <td>{$data['rcm_partida_presupuestal']}</td>
        <td>$ {$data['rcm_monto_gral']}</td>
      </tr>
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

$pdf->Output('ReporteCM '.$id_of_report . '.pdf', 'I');
    }
}