<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompraMenor;
use App\Models\CompraMenorList; // Asegúrate de importar el modelo adecuado
use App\Models\Empresa;
use App\Models\User;



class CompraCMPDF extends Controller
{
    public function generatePDF($folio)
    {
        $compra = CompraMenor::where('cm_folio', $folio)->first();
        $mir = $compra['mir_id_fin']. 
                   $compra['mir_id_proposito'] .
                   $compra['mir_id_componente'] . 
                   $compra['mir_id_actividad'];
        
        $compra2 = CompraMenorList::where('icm_folio', $folio)->get();
        
        $empresaId = $compra->empresa_id;
        
        $empresa = Empresa::where('id', $empresaId)->first();
        
        $solicitante_id = $compra->solicitante_id;
        
        $solicitante = User::where('id', $solicitante_id)->first();
        
        $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        $pdf->titulo = 'Compra | Caja Menor';
        
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
        <th>Solicitante</th>
        <th>Sucursal</th>
        <th>MIR</th>
      </tr>
      <tr class="p-second">
        <td>{$compra['cm_fecha']}</td>
        <td>$folio</td>
        <td>{$solicitante['name']}</td>
        <td>{$compra['sucursal']}</td>
        <td>$mir</td>
      </tr>
    </table>
  </div>

  <div>
    <table>
      <tr class="p-first">
        <th>Justificacion</th>
      </tr>
      <tr class="p-second">
        <td>{$compra['cm_asunto']}</td>
      </tr>
    </table>
  </div>

  <div>
    <label class="p-first">Proveedor</label>
  </div>

  <div>
    <table class="table">
      <tr class="p-first">
        <th>Razón Social</th>
        <th>RFC</th>
        <th>Teléfono</th>
      </tr>
      <tr class="p-second">
        <td>{$empresa['RazonSocial']}</td>
        <td>{$empresa['RFC']}</td>
        <td>{$empresa['Telefono']}</td>
      </tr>
  </div>

  <div>
    <table>
      <tr class="header t-first">
        <th>Cant.</th>
        <th>Concepto</th>
        <th>Partida presupuestal</th>
        <th>P/U</th>
        <th>Importe</th>
      </tr>
EOF;

foreach ($compra2 as $compraItem) {
  $html.= '
      <tr class="center p-second " >
          <td>' . $compraItem['icm_cantidad'] . '</td>
          <td>' . $compraItem['icm_concepto'] . '</td>
          <td>' . $compraItem['icm_partida_presupuestal'] . '</td>
          <td>$' . $compraItem['icm_precio_u'] . '</td>
          <td>$' . $compraItem['icm_importe'] . '</td>
      </tr>
  ';
  $html .= '<tr class="center"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
}

$html.=<<<EOF
    </table>
  </div>
  <div>
    <table class="center">
      <tr class="p-second">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="txt">Subtotal:</td>
        <td class="txt">$ {$compra['cm_subtotal']}</td>
      </tr>
      <tr class="p-second">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="txt">IVA:</td>
        <td class="txt">$ {$compra['cm_iva']}</td>
      </tr>
      <tr class="p-second">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="txt">Total:</td>
        <td class="txt">$ {$compra['cm_total']}</td>
      </tr>
    </table>
  </div>
</div>

EOF;

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('ejemplo.pdf', 'I');
    }
}
