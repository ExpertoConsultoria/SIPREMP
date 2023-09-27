<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\N17A\CajaMenor\CreateSale;

use App\Models\CompraMenor;
use App\Models\CompraMenorList;


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

        $data1 = CompraMenor::all();
        $data2 = CompraMenorList::all();
        return view('17A.caja-menor.main', compact(['data1','data2']));
    })->name('cajamenor');

    // Caja Menor
    Route::get('/caja-menor/create', CreateSale::class)->name('cajamenor.create');


});
