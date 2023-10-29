<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\N17A\CajaMenor\CCMCreate;
use App\Livewire\N17A\CajaMenor\CCMBorradores;
use App\Livewire\N17A\CajaMenor\CCMList;
use App\Livewire\N17A\CajaMenor\CCMDetalles;
use App\Livewire\N17A\CajaMenor\CCMListaReportes;
use App\Livewire\N17A\CajaMenor\CCMReportData;

use App\Livewire\N5\BandejaEntrada\BENew;
use App\Livewire\N5\BandejaEntrada\BERechazada;
use App\Livewire\N5\BandejaEntrada\BEList;
use App\Livewire\N5\BandejaEntrada\BEStatus;
use App\Livewire\N5\BandejaEntrada\BEDetalles;

// Shared Components
use App\Livewire\Shared\Solicitud\SolicitudesCreate;
use App\Livewire\Shared\Solicitud\SolicitudesBorradores;
use App\Livewire\Shared\Solicitud\SolicitudesList;
use App\Livewire\Shared\Solicitud\SolicitudStatus;
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
    Route::get('/solicitudes/create', SolicitudesCreate::class)->name('solicitudes.create');
    Route::get('/solicitudes/borradores', SolicitudesBorradores::class)->name('solicitudes.borradores');
    Route::get('/solicitudes/list', SolicitudesList::class)->name('solicitudes.list');
    Route::get('/solicitudes/{details_of_folio}', SolicitudStatus::class)->name('solicitudes.show');
    Route::get('/solicitudes/{edit_to_folio}/edit', SolicitudesCreate::class)->name('solicitudes.edit');

});
