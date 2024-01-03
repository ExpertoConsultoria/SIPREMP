<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use App\Models\Archivos;

class CotizacionPDF extends Controller
{
    public $cot_folio;

    public function generatePDF($details_of_folio)
    {
        $this->cot_folio = $details_of_folio;

        $cotizacion = Archivos::where('folio',$details_of_folio)->first();

        $structure = "";

        if ($cotizacion->arch_extension === "txt") {
            $structure = '
                <p class="p-second">'. File::get($cotizacion->arch_ruta). '</p>
            ';
        } else{
            $structure = '
                <img class="rounded-t-lg" src="'.($cotizacion->arch_ruta).'" />
            ';
        }

        $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->titulo = 'Cotización';
        $pdf->AddPage();
        $pdf->SetTopMargin(30);
        $pdf->SetAutoPageBreak(true, 10);
        $pdf->SetFont('helvetica', '', 10);

        $html = <<<EOF
            <style>
                .table {
                    width: 100%;
                }

                img, video {
                    max-width: 100%;
                    height: auto;
                }
                img, svg, video, canvas, audio, iframe, embed, object {
                    display: block;
                    vertical-align: middle;
                }

                .rounded-t-lg{
                    border-top-left-radius: 0.5rem;
                    border-top-right-radius: 0.5rem;
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
                            <th>Origen</th>
                            <th>Folio</th>
                        </tr>
                        <tr class="p-second">
                            <td>$cotizacion->fecha_registro</td>
                            <td>$cotizacion->lugar_registro</td>
                            <td>$cotizacion->folio</td>
                        </tr>
                    </table>
                </div>

                <div>
                    <table>
                        <tr class="p-first">
                            <th>Nombre del Archivo</th>
                            <th>Descripción</th>
                        </tr>
                        <tr class="p-second">
                            <td>$cotizacion->arch_nombre</td>
                            <td>$cotizacion->arch_descripcion</td>
                        </tr>
                    </table>
                </div>

                <div>
                    <h2 class="center">Contenido del Documento</h2>
                    $structure
                </div>

            </div>
        EOF;

        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output($this->cot_folio.'.pdf', 'I');
    }
}
