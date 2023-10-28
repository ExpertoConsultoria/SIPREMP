<?php

use Illuminate\Support\Facades\Route;

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

// Shared Components
use App\Livewire\Shared\Solicitud\SolicitudesCreate;
use App\Livewire\Shared\Solicitud\SolicitudesBorradores;
use App\Livewire\Shared\Solicitud\SolicitudesList;
use App\Livewire\Shared\Solicitud\SolicitudStatus;

// Pendiente
use App\Livewire\N4\Expediente\EList;
use App\Livewire\N4\Expediente\EDetalles;

use App\Livewire\N4\Vales\VCreate;
use App\Livewire\N4\Vales\VCreateNew;
use App\Livewire\N4\Vales\VBorradores;
use App\Livewire\N4\Vales\VList;
use App\Livewire\N4\Vales\VDetalles;
use App\Livewire\N4\Vales\VAprobados;
use App\Livewire\N4\Vales\VVer;
use App\Livewire\N4\Vales\VAgregar;
use App\Livewire\N4\Vales\VImprimir;
use App\Livewire\N4\Vales\VExpediente;

use App\Livewire\N3\ComprasConsolidades\CSNuevaCompraConsolidada;
use App\Livewire\N3\ComprasConsolidades\CSCompraConsolidadaBorrador;
use App\Livewire\N3\ComprasConsolidades\CSCompraConsolidadaGuardado;

use App\Livewire\N3\BandejaEntrada\CSBandejaEntrada;
use App\Livewire\N3\BandejaEntrada\CSValeServicio;

use App\Livewire\N3\Solicitudes\CSValeSolicitud;
use App\Livewire\N3\Solicitudes\CSSolicitudesRechazadas;
use App\Livewire\N3\Solicitudes\CSValeValidado;

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
        return view('n4.vales.main');
    })->name('vales');
    Route::get('/expedientes', function () {
        return view('n4.expedientes.main');
    })->name('expedientes');
    Route::get('/inventario', function () {
        return view('n4.inventario.main');
    })->name('inventario');
    Route::get('/compras-consolidadas', function(){
        return view('N3.compras-consolidadas.main');
    })->name('compraconsolidada');
    Route::get('/Solicitudes', function(){
        return view('N3.solicitudes.main');
    })->name('solicitudescompra');

    // Reactive Pages

    //Expedientes
    Route::get('/expediente/list',EList::class)->name('expediente.list');
    Route::get('/expediente/list/detalles',EDetalles::class)->name('expediente.detalles');

    //Vales
    Route::get('/vales/create',VCreate::class)->name('vale.create');
    Route::get('/vales/create-new',VCreateNew::class)->name('vales.createnew');
    Route::get('/vales/borradores',VBorradores::class)->name('vales.borradores');
    Route::get('/vales/list',VList::class)->name('vales.list');
    Route::get('/vales/list/detalles',VDetalles::class)->name('vales.detalles');
    Route::get('/vales/aprobados',VAprobados::class)->name('vales.aprobados');
    Route::get('/vales/aprobados/ver',VVer::class)->name('vales.view');
    Route::get('/vales/aprobados/agregar',VAgregar::class)->name('vales.agregar');
    Route::get('/vales/aprobados/imprimir',VImprimir::class)->name('vales.imprimir');
    Route::get('/vales/aprobados/expediente',VExpediente::class)->name('vales.expediente');

    // compra consolidada
    Route::get('/compra-consolidada/nuevaCompra',CSNuevaCompraConsolidada::class)->name('compraConsolidada.nuevaCompra');
    Route::get('/compra-consolidada/borradorCompra',CSCompraConsolidadaBorrador::class)->name('compraConsolidadaBorrador.borradorCompra');
    Route::get('/compra-consolidada/guardado',CSCompraConsolidadaGuardado::class)->name('compraConsolidadaBorrador.guardado');
    Route::get('/bandeja-entrada-compra',CSBandejaEntrada::class)->name('bandejaEntradaCompra');
    Route::get('/bandeja-entrada-compra/valeServicio',CSValeServicio::class)->name('bandejaEntradaCompra.valeServicio');
    Route::get('/solicitudes/vale',CSValeSolicitud::class)->name('solicitudes.vale');
    Route::get('/solicitudes/rechazadas',CSSolicitudesRechazadas::class)->name('solicitudes.rechazadas');
    Route::get('/solicitudes/revisado-validado',CSValeValidado::class)->name('solicitudes.revisadoValidado');

    //Bandeja Entrada
    Route::get('/bandeja-entrada/pendientes', BEPendientes::class)->name('bandejaentrada.pendientes');
    Route::get('/bandeja-entrada/rechazadas', BERechazadas::class)->name('bandejaentrada.rechazadas');
    Route::get('/bandeja-entrada/aprobadas', BEAprobadas::class)->name('bandejaentrada.aprobadas');
    Route::get('/bandeja-entrada/{details_of_folio}/rechazada', SolicitudRechazada::class)->name('bandejaentrada.rechazada');
    Route::get('/bandeja-entrada/{details_of_folio}/aprobada', SolicitudAceptada::class)->name('bandejaentrada.aprobada');
    Route::get('/bandeja-entrada/{details_of_folio}/details', BEDetalles::class)->name('bandejaentrada.details');

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

});
