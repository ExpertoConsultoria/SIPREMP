<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\N17A\CajaMenor\CCMCreate;
use App\Livewire\N17A\CajaMenor\CCMBorradores;
use App\Livewire\N17A\CajaMenor\CCMList;
use App\Livewire\N17A\CajaMenor\CCMDetalles;

use App\Livewire\N17A\Solicitudes\SolicitudCreate;
use App\Livewire\N17A\Solicitudes\SolicitudBorradores;
use App\Livewire\N17A\Solicitudes\SolicitudList;
use App\Livewire\N17A\Solicitudes\SolicitudStatus;

use App\Livewire\N6\BienesServ\SolicitudesCreate;
use App\Livewire\N6\BienesServ\borradores;
use App\Livewire\N6\BienesServ\lista;
use App\Livewire\N6\BienesServ\status;

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

    // Reactive Pages
    // Caja Menor
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
    Route::get('/borradores-solicitudes', borradores::class)->name('solicitudBienes.borradores');
    Route::get('/lista-solicitudes', lista::class)->name('solicitudBienes.list');
    Route::get('/solicitud-bienes/{details_of_folio}', status::class)->name('solicitudBienes.show');

});
