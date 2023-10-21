<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\N17A\CajaMenor\CCMCreate;
use App\Livewire\N17A\CajaMenor\CCMBorradores;
use App\Livewire\N17A\CajaMenor\CCMList;
use App\Livewire\N17A\CajaMenor\CCMDetalles;
use App\Livewire\N17A\CajaMenor\CCMReportes;

use App\Livewire\N17A\Solicitudes\SolicitudCreate;
use App\Livewire\N17A\Solicitudes\SolicitudBorradores;
use App\Livewire\N17A\Solicitudes\SolicitudList;
use App\Livewire\N17A\Solicitudes\SolicitudStatus;

use App\Livewire\N5\BandejaEntrada\BENew;
use App\Livewire\N5\BandejaEntrada\BERechazada;
use App\Livewire\N5\BandejaEntrada\BEList;
use App\Livewire\N5\BandejaEntrada\BEStatus;
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
    Route::get('/bandeja-entrada/new', BENew::class)->name('bandejaentrada.new');
    Route::get('/bandeja-entrada/rechazadas', BERechazada::class)->name('bandejaentrada.rechazada');
    Route::get('/bandeja-entrada/list', BEList::class)->name('bandejaentrada.list');
    Route::get('/bandeja-entrada/status', BEStatus::class)->name('bandejaentrada.status');
    Route::get('/bandeja-entrada/details', BEDetalles::class)->name('bandejaentrada.details');

    // Caja Menor
    Route::get('/caja-menor/reportes', CCMReportes::class)->name('cajamenor.reportes');
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
});
