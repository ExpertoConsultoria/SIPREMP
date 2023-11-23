<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memorandum;
use App\Models\MemorandumList;
use App\Models\User;

class MemorandumPDF extends Controller
{
    public function generatePDF($details_of_folio)
    {
        $data = Memorandum::where('memo_folio', $details_of_folio)->first();

        $mir = $data['mir_id_fin'].
                   $data['mir_id_proposito'] .
                   $data['mir_id_componente'] .
                   $data['mir_id_actividad'];

        $details = MemorandumList::where('im_folio', $details_of_folio)->first();

        $solicitante_id = $data->solicitante_id;


          $solicitante = User::where('id', $solicitante_id)->first();

$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->titulo = 'Memorándum';

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
        <th>Fecha</th>
        <th>Folio</th>
        <th>MIR</th>
      </tr>
      <tr class="p-second">
        <td>{$data['memo_folio']}</td>
        <td>{$data['memo_folio']}</td>
        <td>$mir</td>
      </tr>
    </table>
  </div>

  <div>
  <table class="table">
    <tr class="p-first">
      <th>Solicitante</th>
      <th>Área</th>
      <th>Lugar</th>
      <th>Destinatario</th>
    </tr>
    <tr class="p-second">
      <td>{$solicitante['name']}</td>
      <td>{$data['area']}</td>
      <td>{$data['memo_sucursal']}</td>
      <td>{$data['destinatario']}</td>
    </tr>
</div>

  <div>
    <table>
      <tr class="p-first">
        <th>Asunto</th>
      </tr>
      <tr class="p-second">
        <td>{$data['memo_asunto']}</td>
      </tr>
    </table>
  </div>

  <div>
    <table>
      <tr class="header t-first">
        <th>Cant.</th>
        <th>Unidad de medida</th>
        <th>Concepto</th>
        <th>Partida presupuestal</th>
      </tr>
      <tr class="center p-second">
        <td>{$details['im_cantidad']}</td>
        <td>{$details['im_unidad_medida']}</td>
        <td>{$details['im_concepto']}</td>
        <td>{$details['im_partida_presupuestal']}</td>
      </tr>
    </table>
  </div>
</div>

EOF;

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

$html = <<<EOF
<div>
<table class="title">
  <tr>
    <th>SOLICITÓ</th>
    <th>FECHA</th>
    <th>FIRMA</th>
  </tr>
</table>

<table>
  <tr class="p-first">
    <th>Carlos A. Baldiviezo</th>
  </tr>
  <tr class="p-second">
    <td>JEFE DE DEPTO. DE SERV. GRALES</td>
  </tr>
</table>
</div>


<div>
<table class="title">
  <tr>
    <th>SOLICITÓ</th>
    <th>FECHA</th>
    <th>FIRMA</th>
  </tr>
</table>

<table>
  <tr class="p-first">
    <th>Carlos A. Baldiviezo</th>
  </tr>
  <tr class="p-second">
    <td>JEFE DE DEPTO. DE SERV. GRALES</td>
  </tr>
</table>
</div>


<div>
<table class="title">
  <tr>
    <th>REVISÓ Y VALIDÓ</th>
    <th>FECHA</th>
    <th>FIRMA</th>
  </tr>
</table>

<table>
  <tr class="p-first">
    <th>Francisco Gómez Flores</th>
  </tr>
  <tr class="p-second">
    <td>JEFE DE LA UNIDAD TÉCNICA</td>
  </tr>
</table>
</div>

<div>
<table class="title">
  <tr>
    <th>DISPONIBILIDAD PRESUPUESTAL</th>
    <th></th>
    <th>FIRMA</th>
  </tr>
</table>

<table>
  <tr class="p-first">
    <th>Roberto Ebenezer Rosas</th>
  </tr>
  <tr class="p-second">
    <td>JEFE DE LA UNIDAD TÉCNICA</td>
  </tr>
</table>
</div>

<div>
<table class="title">
  <tr>
    <th>AUTORIZÓ</th>
    <th></th>
    <th>FIRMA</th>
  </tr>
</table>

<table>
  <tr class="p-first">
    <th>Miguel Ricardo Cruz</th>
  </tr>
  <tr class="p-second">
    <td>DIRECTOR ADMINISTRATIVO</td>
  </tr>
</table>
</div>
EOF;
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

$html = <<<EOF
<div>
    <table class="title">
      <tr>
        <th>EVIDENCIA</th>
      </tr>
    </table>
</div>
EOF;
$pdf->titulo = 'Factura';
$pdf->AddPage();

$pdf->Output('ejemplo.pdf', 'I');
    }
}
