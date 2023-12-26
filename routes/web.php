<?php

use Illuminate\Support\Facades\Route;

// Shared Components
use App\Livewire\Shared\CajaMenor\CCMCreate;
use App\Livewire\Shared\CajaMenor\CCMBorradores;
use App\Livewire\Shared\CajaMenor\CCMList;
use App\Livewire\Shared\CajaMenor\CCMDetalles;
use App\Livewire\Shared\CajaMenor\CCMListaReportes;
use App\Livewire\Shared\CajaMenor\CCMReportData;

use App\Livewire\Shared\BandejaEntrada\BEPendientes;
use App\Livewire\Shared\BandejaEntrada\BERechazadas;
use App\Livewire\Shared\BandejaEntrada\BEAprobadas;
use App\Livewire\Shared\BandejaEntrada\SolicitudRechazada;
use App\Livewire\Shared\BandejaEntrada\SolicitudAceptada;
use App\Livewire\Shared\BandejaEntrada\BEDetalles;
use App\Livewire\Shared\BandejaEntrada\BEAdvancedDetails;
use App\Livewire\Shared\BandejaEntrada\BEValeServicio;

use App\Livewire\Shared\Solicitud\SolicitudesCreate;
use App\Livewire\Shared\Solicitud\SolicitudesBorradores;
use App\Livewire\Shared\Solicitud\SolicitudesList;
use App\Livewire\Shared\Solicitud\SolicitudStatus;

// For Specific Users

// Pendiente
use App\Livewire\N4\Expediente\EList;
use App\Livewire\N4\Expediente\EDetalles;
use App\Livewire\N4\Expediente\ExpedienteCreate;
use App\Livewire\N4\Inventario\EntradaInventario;


use App\Livewire\N4\Vales\VCreateFromMemo;
use App\Livewire\N4\Vales\VCreate;
use App\Livewire\N4\Vales\VBorradores;
use App\Livewire\N4\Vales\VSentAndRevised;
use App\Livewire\N4\Vales\VDetalles;
use App\Livewire\N4\Vales\VAprobados;
use App\Livewire\N4\Vales\VApprovedDetails;
use App\Livewire\N4\Vales\VAgregar;
use App\Livewire\N4\Vales\VImprimir;
use App\Livewire\N4\Vales\VExpediente;

use App\Livewire\N4\Inventario\ICrearEntrada;
use App\Livewire\N4\Inventario\ICrearSalida;
use App\Livewire\N4\Inventario\IInventario;
use App\Livewire\N4\Inventario\IHistorial;
use App\Livewire\N4\Inventario\IDetails;

use App\Livewire\N3\ComprasConsolidades\CSNuevaCompraConsolidada;
use App\Livewire\N3\ComprasConsolidades\CSCompraConsolidadaBorrador;
use App\Livewire\N3\ComprasConsolidades\CSCompraConsolidadaGuardado;

use App\Livewire\N3\SolicitudesVales\VSRechazadas;
use App\Livewire\N3\SolicitudesVales\VSRechazado;

use App\Http\Controllers\CompraCMPDF;
use App\Http\Controllers\ReporteCMPDF;
use App\Http\Controllers\MemorandumPDF;
use App\Http\Controllers\CotizacionPDF;
use App\Http\Controllers\ValePDF;

// * Proveedores
use App\Livewire\ut\proveedores\PGeneral;
use App\Livewire\ut\proveedores\PDetalles;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // DashBoard
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

    // Rest Screens
        Route::get('/caja-menor', function () {
            return view('shared.caja-menor.main');
        })->name('cajamenor');

        Route::get('/solicitudes', function () {
            return view('shared.solicitudes.main');
        })->name('solicitudes');

        Route::get('/Bandeja-entrada', function () {
            return view('shared.bandeja-entrada.main');
        })->name('bandejaentrada');

        Route::get('/vales', function () {
            return view('SG.vales.main');
        })->name('vales');

        Route::get('/expedientes', function () {
            return view('SG.expedientes.main');
        })->name('expedientes');

        Route::get('/inventario', function () {
            return view('SG.inventario.main');
        })->name('inventario');

        Route::get('/compras-consolidadas', function(){
            return view('UT.compras-consolidadas.main');
        })->name('compraconsolidada');

        Route::get('/proveedores', function(){
            return view('UT.Proveedores.main');
        })->name('proveedores');

    // Reactive Pages
    //pdf
    Route::get('/caja-menor/pdf-compra/{folio}', [CompraCMPDF::class, 'generatePDF'])->name('pdf.CompraCM');
    Route::get('/caja-menor/pdf-reporte/RCM-{id_of_report}', [ReporteCMPDF::class, 'generatePDF'])->name('pdf.ReporteCM');
    Route::get('/solicitudes/pdf-reporte/{details_of_folio}', [MemorandumPDF::class, 'generatePDF'])->name('pdf.Memorandum');
    Route::get('/solicitudes/pdf-cotizacion', [CotizacionPDF::class, 'generatePDF'])->name('pdf.Cotizacion');
    //Pendiente
    // Route::get('/vale/pdf-vale', [ValePDF::class, 'generatePDF'])->name('pdf.vale');


    //Inventario
    Route::get('/inventario/entrada',ICrearEntrada::class)->name('inventario.entrada');
    Route::get('/inventario/salida',ICrearSalida::class)->name('inventario.salida');
    Route::get('/inventario/list',IInventario::class)->name('inventario.list');
    Route::get('/inventario/historial',IHistorial::class)->name('inventario.historial');
    Route::get('/inventario/detalles/{folio}',IDetails::class)->name('inventario.detalles');
    Route::get('/Inventario/create', EntradaInventario::class)->name('inventario.create');

    //Expedientes
    Route::get('/expediente/list',EList::class)->name('expediente.list');
    Route::get('/expediente/list/detalles',EDetalles::class)->name('expediente.detalles');

    //Vales
    Route::get('/vales/create-from-memorandum/{details_of_folio}',VCreateFromMemo::class)->name('vale.create-from-memo');
    Route::get('/vales/create',VCreate::class)->name('vales.create');
    Route::get('/vales/edit/{edit_to_folio}',VCreate::class)->name('vales.edit');
    Route::get('/vales/borradores',VBorradores::class)->name('vales.borradores');
    Route::get('/vales/send-and-revised',VSentAndRevised::class)->name('vales.send-revised');
    Route::get('/vales/send-and-revised/detalles/{details_of_folio}',VDetalles::class)->name('vales.detalles');

    Route::get('/vales/aprobados',VAprobados::class)->name('vales.aprobados');
    Route::get('/vales/aprobados/{details_of_folio}/detalles',VApprovedDetails::class)->name('vales.approved-details');
    Route::get('/vales/aprobados/{details_of_folio}/agregar',VAgregar::class)->name('vales.add-to-approved');
    Route::get('/vales/aprobados/{details_of_folio}/imprimir',VImprimir::class)->name('vales.print-approved');
    Route::get('/vales/aprobados/{details_of_folio}/expediente',VExpediente::class)->name('vales.expediente');

    Route::get('/solicitudes-de-vales/rechazadas',VSRechazadas::class)->name('vales-solicitudes.rechazadas');
    Route::get('/solicitudes-de-vales/rechazadas/{details_of_folio}/detalles',VSRechazado::class)->name('vales-solicitudes.details');

    // compra consolidada
    Route::get('/compra-consolidada/nuevaCompra',CSNuevaCompraConsolidada::class)->name('compraConsolidada.nuevaCompra');
    Route::get('/compra-consolidada/borradorCompra',CSCompraConsolidadaBorrador::class)->name('compraConsolidada.borradorCompra');
    Route::get('/compra-consolidada/guardado',CSCompraConsolidadaGuardado::class)->name('compraConsolidada.guardado');

    //Bandeja Entrada
    Route::get('/bandeja-entrada/pendientes', BEPendientes::class)->name('bandejaentrada.pendientes');
    Route::get('/bandeja-entrada/rechazadas', BERechazadas::class)->name('bandejaentrada.rechazadas');
    Route::get('/bandeja-entrada/aprobadas', BEAprobadas::class)->name('bandejaentrada.aprobadas');
    Route::get('/bandeja-entrada/{details_of_folio}/rechazada', SolicitudRechazada::class)->name('bandejaentrada.rechazada');
    Route::get('/bandeja-entrada/{details_of_folio}/aprobada', SolicitudAceptada::class)->name('bandejaentrada.aprobada');
    Route::get('/bandeja-entrada/{details_of_folio}/details', BEDetalles::class)->name('bandejaentrada.details');
    Route::get('/bandeja-entrada/{details_of_folio}/advanced-details', BEAdvancedDetails::class)->name('bandejaentrada.advanced-details');
    Route::get('/bandeja-entrada/valeServicio/{details_of_folio}', BEValeServicio::class)->name('bandejaentrada.valeServicio');


    // Caja Menor
    Route::get('/caja-menor/reportes', CCMListaReportes::class)->name('cajamenor.reportes');
    Route::get('/caja-menor/reporte/RCM-{id_of_report}', CCMReportData::class)->name('cajamenor.reportData');
    Route::get('/caja-menor/create', CCMCreate::class)->name('cajamenor.create');
    Route::get('/caja-menor/borradores', CCMBorradores::class)->name('cajamenor.borradores');
    Route::get('/caja-menor/list', CCMList::class)->name('cajamenor.compras');
    Route::get('/caja-menor/{details_of_folio}', CCMDetalles::class)->name('cajamenor.show');
    Route::get('/caja-menor/{edit_to_folio}/edit', CCMCreate::class)->name('cajamenor.edit');

    // Solicitud
    Route::get('/solicitudes/create', SolicitudesCreate::class)->name('solicitudes.create');
    Route::get('/solicitudes/borradores', SolicitudesBorradores::class)->name('solicitudes.borradores');
    Route::get('/solicitudes/list', SolicitudesList::class)->name('solicitudes.list');
    Route::get('/solicitudes/{details_of_folio}', SolicitudStatus::class)->name('solicitudes.show');
    Route::get('/solicitudes/{edit_to_folio}/edit', SolicitudesCreate::class)->name('solicitudes.edit');

    // Expedientes
    Route::get('/expediente/ExpedienteCreate', ExpedienteCreate::class)->name('expediente.create');

    // Expedientes
    Route::get('/proveedores/proveedores-pendientes', PGeneral::class)->name('proveedores.pendientes');
    Route::get('/proveedores/proveedor-detalles/{id_proveedor}', PDetalles::class)->name('proveedores.detalles');

});
