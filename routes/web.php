<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\N17A\CajaMenor\CCMCreate;
use App\Livewire\N17A\CajaMenor\CCMBorradores;
use App\Livewire\N17A\CajaMenor\CCMList;
use App\Livewire\N17A\CajaMenor\CCMDetalles;
use App\Livewire\N17A\CajaMenor\CCMListaReportes;
use App\Livewire\N17A\CajaMenor\CCMReportData;

use App\Livewire\N17A\Solicitudes\SolicitudCreate;
use App\Livewire\N17A\Solicitudes\SolicitudBorradores;
use App\Livewire\N17A\Solicitudes\SolicitudList;
use App\Livewire\N17A\Solicitudes\SolicitudStatus;

use App\Livewire\N6\BienesServ\SolicitudesCreate;
use App\Livewire\N6\BienesServ\Borradores;
use App\Livewire\N6\BienesServ\Lista;
use App\Livewire\N6\BienesServ\Status;

use App\Livewire\N5\BandejaEntrada\BENew;
use App\Livewire\N5\BandejaEntrada\BERechazada;
use App\Livewire\N5\BandejaEntrada\BEList;
use App\Livewire\N5\BandejaEntrada\BEStatus;
use App\Livewire\N5\BandejaEntrada\BEDetalles;

use App\Livewire\N4\BandejaEntrada\BEVer;
use App\Livewire\N4\BandejaEntrada\BELista;
use App\Livewire\N4\Vales\VCreate;
use App\Livewire\N4\Vales\VCreateNew;
use App\Livewire\N4\Vales\VBorradores;
use App\Livewire\N4\Vales\VList;
use App\Livewire\N4\Vales\VAprobados;
use App\Livewire\N4\Vales\VDetalles;
use App\Livewire\N4\Vales\VVer;
use App\Livewire\N4\Vales\VAgregar;
use App\Livewire\N4\Vales\VImprimir;
use App\Livewire\N4\Vales\VExpediente;
use App\Livewire\N4\Expediente\EList;
use App\Livewire\N4\Expediente\EDetalles;

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
        return view('17A.caja-menor.main');
    })->name('cajamenor');
    Route::get('/solicitudes', function () {
        return view('17A.solicitudes.main');
    })->name('solicitudes');
    Route::get('/Bandeja-entrada', function () {
        return view('N5.main');
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
    //N3
    Route::get('/bandeja-entrada/lista', BELista::class)->name('bandejaentrada.lista');
    Route::get('/bandeja-entrada/lista/ver', BEVer::class)->name('bandejaentrada.ver');


    Route::get('/bandeja-entrada/new', BENew::class)->name('bandejaentrada.new');
    Route::get('/bandeja-entrada/rechazadas', BERechazada::class)->name('bandejaentrada.rechazada');
    Route::get('/bandeja-entrada/list', BEList::class)->name('bandejaentrada.list');
    Route::get('/bandeja-entrada/status', BEStatus::class)->name('bandejaentrada.status');
    Route::get('/bandeja-entrada/details', BEDetalles::class)->name('bandejaentrada.details');

    // Caja Menor
    Route::get('/caja-menor/reportes', CCMListaReportes::class)->name('cajamenor.reportes');
    Route::get('/caja-menor/reporte/RCM-{id_of_report}', CCMReportData::class)->name('cajamenor.reportData');
    Route::get('/caja-menor/create', CCMCreate::class)->name('cajamenor.create');
    Route::get('/caja-menor/borradores', CCMBorradores::class)->name('cajamenor.borradores');
    Route::get('/caja-menor/list', CCMList::class)->name('cajamenor.compras');
    Route::get('/caja-menor/{details_of_folio}', CCMDetalles::class)->name('cajamenor.show');
    Route::get('/caja-menor/{edit_to_folio}/edit', CCMCreate::class)->name('cajamenor.edit');

    // Solicitud
    Route::get('/solicitudes/create', SolicitudCreate::class)->name('solicitudes.create');
    Route::get('/solicitudes/borradores', SolicitudBorradores::class)->name('solicitudes.borradores');
    Route::get('/solicitudes/list', SolicitudList::class)->name('solicitudes.list');
    Route::get('/solicitudes/{details_of_folio}', SolicitudStatus::class)->name('solicitudes.show');
    Route::get('/solicitudes/{edit_to_folio}/edit', SolicitudCreate::class)->name('solicitudes.edit');

    //  Solicitudes del nivel N617A
    Route::get('/solicitud-bienes', SolicitudesCreate::class)->name('solicitudBienes.create');
    Route::get('/solicitudes-bienes/{edit_to_folio}/edit', SolicitudesCreate::class)->name('solicitudBienes.edit');
    Route::get('/borradores-solicitudes', Borradores::class)->name('solicitudBienes.borradores');
    Route::get('/lista-solicitudes', Lista::class)->name('solicitudBienes.list');
    Route::get('/solicitud-bienes/{details_of_folio}', Status::class)->name('solicitudBienes.show');

});
