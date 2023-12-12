<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use App\Models\Empresa;
use App\Models\Archivos;
use App\Models\Vales_compra;
use App\Models\Elementos_Vale_compra;

use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;

class ValePDF extends Controller
{

    public $vale_folio;

    public function generatePDF($details_of_folio)
    {
        // Datos del PDF
            //Folio del Vale
                $this->vale_folio = $details_of_folio;

            // Datos del Vale
                $vale_details = Vales_compra::where('folio', $details_of_folio)->first();

                $vale_elements = Elementos_Vale_compra::where('vales_compra_id', $vale_details->id)->get();
                $vale_details->load('solicitante');

                $solicitante = $vale_details->solicitante;
                $solicitante_area = $solicitante?->org4empleado?->org3Puesto?->org2Area ? $solicitante?->org4empleado?->org3Puesto?->org2Area->AreaNombre : $solicitante->name;

            // Forge Mir
                $fin = Plan1Fin::where('id',$vale_details->NoFin)->first();
                $proposito = Plan2Proposito::where('id',$vale_details->NoProposito)->first();
                $componente = Plan3Componente::where('id',$vale_details->NoComponente)->first();
                $actividad = Plan4Actividad::where('id',$vale_details->NoActividad)->first();

                $mir =$fin->NoFin.'-'.$proposito->NoProposito.'-'.$componente->NoComponente.'-'.$actividad->NoActividad;

            // Proveedor Data
                $proveedor = Empresa::find($vale_details->id_proveedor);
                $proveedor_telefono = $proveedor?->Telefono ? $proveedor->Telefono : 'Ninguno';

            //Evidencia
                $evidencia = Archivos::find($vale_details->id_evidencia);

                $structure_evidence = '
                    <img class="rounded-t-lg" src="' . ($evidencia->arch_ruta) . '" />
                ';

            // Cotización
            $cotizacion = Archivos::find($vale_details->id_cotizacion);

            $structure_cotizacion = "";

            if ($cotizacion->arch_extension === "pdf") {
                $structure_cotizacion = "";
            }elseif ($cotizacion->arch_extension === "txt") {
                $structure_cotizacion = '
                            <p class="p-second">' . File::get($cotizacion->arch_ruta) . '</p>
                        ';
            } else {
                $structure_cotizacion = '
                            <img class="rounded-t-lg" src="' . ($cotizacion->arch_ruta) . '" />
                        ';
            }


        // Estructura del PDF
            $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->titulo = 'Vale de Compra o Servicio';
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
                    text-align: start;
                    font-style: times;
                    font-weight: bold;
                }

                .p-second {
                    color: rgb(83, 83, 83);
                    font-size: medium;
                    margin-top: none;
                }

                .m {
                    margin-top: 0;
                    text-justify: auto;
                }

                .ml {
                    margin-left: 10cm;
                }

                .txt {
                    text-align: start;
                }

                .title {
                    padding: 1px 0;
                    background-color: #d9d9d9;
                    color: #515151;
                    font-style: times;
                    font-weight: bold;
                    text-align: center;
                }

                .line {
                    border-bottom: 1px solid black;
                }
            </style>

            <div>
                <div>
                    <table>
                        <tr class="p-first">
                            <th>Fecha</th>
                            <th>Folio</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr class="p-second">
                            <td>$vale_details->fecha</td>
                            <td>$vale_details->folio</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>

                <div>
                    <table>
                    <tr class="p-first">
                        <th>Solicitante</th>
                        <th>Area</th>
                        <th>Lugar</th>
                        <th>MIR</th>
                    </tr>
                    <tr class="p-second">
                        <td>$solicitante->name</td>
                        <td>$solicitante_area</td>
                        <td>$vale_details->lugar</td>
                        <td>$mir</td>
                    </tr>
                    </table>
                </div>

                <div>
                    <table class="title">
                        <tr>
                            <th>DATOS DEL PROVEEDOR</th>
                        </tr>
                    </table>

                    <table>
                        <tr class="p-first">
                            <th>Razón Social</th>
                            <th>RFC</th>
                            <th>Teléfono</th>
                        </tr>
                        <tr class="p-second">
                            <td>$proveedor->RazonSocial</td>
                            <td>$proveedor->RFC</td>
                            <td>$proveedor_telefono</td>
                        </tr>
                    </table>
                </div>

                <div>
                    <table class="title">
                    <tr>
                        <th>HERRAMIENTAS MENORES</th>
                    </tr>
                    </table>

                    <table>
                    <tr class="header t-first">
                        <th>Cant.</th>
                        <th>Descripción</th>
                        <th>P/U</th>
                        <th>Unidad Medida</th>
                        <th>Importe</th>
                    </tr>

            EOF;

                foreach ($vale_elements as $element) {
                    $html.= '
                        <tr class="center p-second " >
                            <td>' . $element['cantidad'] . '</td>
                            <td>' . $element['concepto'] . '</td>
                            <td>' . $element['precio_unitario'] . '</td>
                            <td>' . $element['unidad_medida'] . '</td>
                            <td>' . $element['importe'] . '</td>
                        </tr>
                    ';
                    $html .= '<tr class="center"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
                }

            $html.=<<<EOF
                    </table>
                </div>

                <div class="line"></div>

                <div>
                    <table class="center">
                    <tr class="p-second">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="txt-first">Subtotal:</td>
                        <td class="txt">$vale_details->subtotal</td>
                    </tr>
                    <tr class="p-second">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="txt-first">IVA:</td>
                        <td class="txt">$vale_details->iva</td>
                    </tr>
                    <tr class="p-second">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="txt-first">Total:</td>
                        <td class="txt">$vale_details->total_compra</td>
                    </tr>
                    </table>
                </div>

                <div>
                    <table class="title">
                    <tr>
                        <th>CONDICIONES DE ENTREGA</th>
                    </tr>
                    </table>
                    <table>
                    <tr>
                        <th class="txt-first">Lugar:</th>
                        <th class="txt">$vale_details->lugar_entrega</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="txt-first">Fecha:</th>
                        <th class="txt">$vale_details->fecha_entrega</th>
                    </tr>
                    </table>
                </div>

                <div>
                    <table class="title">
                    <tr>
                        <th>JUSTIFICACIÓN</th>
                    </tr>
                    </table>
                    <table>
                    <tr>
                        <td>$vale_details->justificacion</td>
                    </tr>
                    </table>
                </div>
            </div>
        EOF;


        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->AddPage();

        $html = <<<EOF
            <style>
                .p-first {
                    color: rgb(81, 81, 81);
                    font-style: times;
                    font-weight: bold;
                    text-align: left;
                }

                .p-second {
                    color: rgb(83, 83, 83);
                    font-size: medium;
                    margin-top: none;
                }

                .title {
                    padding: 1px 0;
                    background-color: #d9d9d9;
                    color: #515151;
                    font-style: times;
                    font-weight: bold;
                    text-align: center;
                }
            </style>

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
            <style>
                .title {
                    padding: 1px 0;
                    background-color: #d9d9d9;
                    color: #515151;
                    font-style: times;
                    font-weight: bold;
                    text-align: center;
                }
            </style>

            <div>
                <table class="title">
                    <tr>
                        <th>EVIDENCIA</th>
                    </tr>
                </table>

                $structure_evidence
            </div>
        EOF;
        $pdf->writeHTML($html, true, false, true, false, '');


        $pdf->titulo = 'Cotización';
        $pdf->AddPage();

        $html = <<<EOF
            <style>
                .title {
                    padding: 1px 0;
                    background-color: #d9d9d9;
                    color: #515151;
                    font-style: times;
                    font-weight: bold;
                    text-align: center;
                }
            </style>

            <div>
                $structure_cotizacion
            </div>
        EOF;
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output($this->vale_folio . '.pdf', 'I');

    }
}
