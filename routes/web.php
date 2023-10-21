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

use App\Livewire\N5\BandejaEntrada\BEPendientes;
use App\Livewire\N5\BandejaEntrada\BERechazadas;
use App\Livewire\N5\BandejaEntrada\BEAprobadas;
use App\Livewire\N5\BandejaEntrada\SolicitudRechazada;
use App\Livewire\N5\BandejaEntrada\SolicitudAceptada;
use App\Livewire\N5\BandejaEntrada\BEDetalles;
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

    // Reactive Pages
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
