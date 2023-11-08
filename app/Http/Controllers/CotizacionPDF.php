<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CotizacionPDF extends Controller
{
    public function generatePDF()
    {
        $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->titulo = 'Cotización';

        $pdf->AddPage();
        
        $pdf->SetTopMargin(30);
        
        $pdf->SetAutoPageBreak(true, 10);
        
        $pdf->SetFont('helvetica', '', 10);
        
        $pdf->Output('ejemplo.pdf', 'I');
    }
}
