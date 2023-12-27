<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValePDF extends Controller
{
    // public function generatePDF(){
    //     $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    //     $pdf->titulo = 'Vale | Solicitud #0001';
    //     $pdf->AddPage();

    //     $pdf->SetTopMargin(30);
    //     $pdf->SetAutoPageBreak(true, 10);
    //     $pdf->SetFont('helvetica', '', 10);

    //     $html = <<<EOF
    //     <style>
    //       .table {
    //         width: 100%;
    //       }

    //       .header {
    //         background-color: rgb(81, 81, 81);
    //         color: white;
    //       }

    //       .center {
    //         text-align: center;
    //       }

    //       .p-first {
    //         color: rgb(81, 81, 81);
    //         font-style: times;
    //         font-weight: bold;
    //         text-align: left;
    //       }

    //       .t-first {
    //         font-style: times;
    //         font-weight: bold;
    //         text-align: center;
    //       }

    //       .txt-first {
    //         text-align: start;
    //         font-style: times;
    //         font-weight: bold;
    //       }


    //       .p-second {
    //         color: rgb(83, 83, 83);
    //         font-size: medium;
    //         margin-top: none;
    //       }

    //       .m {
    //         margin-top: 0;
    //         text-justify: auto;
    //       }

    //       .ml {
    //         margin-left: 10cm;
    //       }

    //       .txt {
    //         text-align: start;
    //       }

    //       .title {
    //         padding: 1px 0;
    //         background-color: #d9d9d9;
    //         color: #515151;
    //         font-style: times;
    //         font-weight: bold;
    //         text-align: center;
    //       }

    //       .line {
    //         border-bottom: 1px solid black;
    //       }
    //     </style>
    //     <div>
    //       <div>
    //         <table>
    //           <tr class="p-first">
    //             <th>Fecha</th>
    //             <th>Folio</th>
    //             <th></th>
    //             <th></th>
    //           </tr>
    //           <tr class="p-second">
    //             <td>13/09/2023</td>
    //             <td>SP-000001</td>
    //             <td></td>
    //             <td></td>
    //           </tr>
    //         </table>
    //       </div>

    //       <div>
    //         <table>
    //           <tr class="p-first">
    //             <th>Solicitudes</th>
    //             <th>Area</th>
    //             <th>Lugar</th>
    //             <th>MIR</th>
    //           </tr>
    //           <tr class="p-second">
    //             <td>User</td>
    //             <td>Área</td>
    //             <td>Matriz</td>
    //             <td>97438498328498-38293898</td>
    //           </tr>
    //         </table>
    //       </div>

    //       <div>
    //         <table class="title">
    //           <tr>
    //             <th>DATOS DEL PROVEEDOR</th>
    //           </tr>
    //         </table>

    //         <table>
    //           <tr class="p-first">
    //             <th>Razón Social</th>
    //             <th>RFC</th>
    //             <th>Teléfono</th>
    //           </tr>
    //           <tr class="p-second">
    //             <td>LOREM IMPSUM</td>
    //             <td>HHHHH09090900</td>
    //             <td>000 000 0000</td>
    //           </tr>
    //         </table>
    //       </div>

    //       <div>
    //         <table class="title">
    //           <tr>
    //             <th>HERRAMIENTAS MENORES</th>
    //           </tr>
    //         </table>

    //         <table>
    //           <tr class="header t-first">
    //             <th>Cant.</th>
    //             <th>Descripción</th>
    //             <th></th>
    //             <th>P/U</th>
    //             <th>Importe</th>
    //           </tr>
    //           <tr class="center p-second">
    //             <td>1</td>
    //             <td>Descripción</td>
    //             <td></td>
    //             <td>$1,547.50</td>
    //             <td>$1,547.50</td>
    //           </tr>
    //         </table>
    //       </div>

    //       <div class="line"></div>

    //       <div>
    //         <table class="center">
    //           <tr class="p-second">
    //             <td></td>
    //             <td></td>
    //             <td></td>
    //             <td></td>
    //             <td class="txt-first">Subtotal:</td>
    //             <td class="txt">$100</td>
    //           </tr>
    //           <tr class="p-second">
    //             <td></td>
    //             <td></td>
    //             <td></td>
    //             <td></td>
    //             <td class="txt-first">IVA:</td>
    //             <td class="txt">$100</td>
    //           </tr>
    //           <tr class="p-second">
    //             <td></td>
    //             <td></td>
    //             <td></td>
    //             <td></td>
    //             <td class="txt-first">Total:</td>
    //             <td class="txt">$100</td>
    //           </tr>
    //         </table>
    //       </div>

    //       <div>
    //         <table class="title">
    //           <tr>
    //             <th>CONDICIONES DE ENTREGA</th>
    //           </tr>
    //         </table>
    //         <table>
    //           <tr>
    //             <th class="txt-first">Lugar:</th>
    //             <th class="txt">Matriz</th>
    //             <th></th>
    //             <th></th>
    //             <th></th>
    //             <th class="txt-first">Fecha:</th>
    //             <th class="txt">13/09/2023</th>
    //           </tr>
    //         </table>
    //       </div>

    //       <div>
    //         <table class="title">
    //           <tr>
    //             <th>JUSTIFICACIÓN</th>
    //           </tr>
    //         </table>
    //         <table>
    //           <tr>
    //             <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa ipsam perspiciatis dolores, et eius aspernatur commodi dolorem possimus corporis odit iste blanditiis quia suscipit ab nam tempora adipisci culpa id.</td>
    //           </tr>
    //         </table>
    //       </div>
    //     EOF;


    //     // output the HTML content
    //     $pdf->writeHTML($html, true, false, true, false, '');

    //     $pdf->AddPage();

    //     $html = <<<EOF
    //     <style>
    //       .p-first {
    //         color: rgb(81, 81, 81);
    //         font-style: times;
    //         font-weight: bold;
    //         text-align: left;
    //       }

    //       .p-second {
    //         color: rgb(83, 83, 83);
    //         font-size: medium;
    //         margin-top: none;
    //       }

    //       .title {
    //         padding: 1px 0;
    //         background-color: #d9d9d9;
    //         color: #515151;
    //         font-style: times;
    //         font-weight: bold;
    //         text-align: center;
    //       }
    //     </style>
    //     <div>
    //         <table class="title">
    //           <tr>
    //             <th>SOLICITÓ</th>
    //             <th>FECHA</th>
    //             <th>FIRMA</th>
    //           </tr>
    //         </table>

    //         <table>
    //           <tr class="p-first">
    //             <th>Carlos A. Baldiviezo</th>
    //           </tr>
    //           <tr class="p-second">
    //             <td>JEFE DE DEPTO. DE SERV. GRALES</td>
    //           </tr>
    //         </table>
    //       </div>


    //       <div>
    //         <table class="title">
    //           <tr>
    //             <th>SOLICITÓ</th>
    //             <th>FECHA</th>
    //             <th>FIRMA</th>
    //           </tr>
    //         </table>

    //         <table>
    //           <tr class="p-first">
    //             <th>Carlos A. Baldiviezo</th>
    //           </tr>
    //           <tr class="p-second">
    //             <td>JEFE DE DEPTO. DE SERV. GRALES</td>
    //           </tr>
    //         </table>
    //       </div>


    //       <div>
    //         <table class="title">
    //           <tr>
    //             <th>REVISÓ Y VALIDÓ</th>
    //             <th>FECHA</th>
    //             <th>FIRMA</th>
    //           </tr>
    //         </table>

    //         <table>
    //           <tr class="p-first">
    //             <th>Francisco Gómez Flores</th>
    //           </tr>
    //           <tr class="p-second">
    //             <td>JEFE DE LA UNIDAD TÉCNICA</td>
    //           </tr>
    //         </table>
    //       </div>

    //       <div>
    //         <table class="title">
    //           <tr>
    //             <th>DISPONIBILIDAD PRESUPUESTAL</th>
    //             <th></th>
    //             <th>FIRMA</th>
    //           </tr>
    //         </table>

    //         <table>
    //           <tr class="p-first">
    //             <th>Roberto Ebenezer Rosas</th>
    //           </tr>
    //           <tr class="p-second">
    //             <td>JEFE DE LA UNIDAD TÉCNICA</td>
    //           </tr>
    //         </table>
    //       </div>

    //       <div>
    //         <table class="title">
    //           <tr>
    //             <th>AUTORIZÓ</th>
    //             <th></th>
    //             <th>FIRMA</th>
    //           </tr>
    //         </table>

    //         <table>
    //           <tr class="p-first">
    //             <th>Miguel Ricardo Cruz</th>
    //           </tr>
    //           <tr class="p-second">
    //             <td>DIRECTOR ADMINISTRATIVO</td>
    //           </tr>
    //         </table>
    //       </div>
    //     EOF;
    //     $pdf->writeHTML($html, true, false, true, false, '');

    //     $pdf->AddPage();
    //     $html = <<<EOF
    //     <style>
    //     .title {
    //     padding: 1px 0;
    //     background-color: #d9d9d9;
    //     color: #515151;
    //     font-style: times;
    //     font-weight: bold;
    //     text-align: center;
    //     }
    //     </style>

    //     <div>
    //         <table class="title">
    //           <tr>
    //             <th>EVIDENCIA</th>
    //           </tr>
    //         </table>
    //       </div>
    //     EOF;
    //     $pdf->writeHTML($html, true, false, true, false, '');


    //     $pdf->titulo = 'Cotización';
    //     $pdf->AddPage();

    //     $pdf->Output('ejemplo.pdf', 'I');
    // }
}
