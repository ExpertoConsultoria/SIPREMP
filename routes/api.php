<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

// Notificaciones de Bandeja de Entrada
Route::get('/trayAlert/{role}', [ApiController::class, 'trayAlert']);
// Notificaciones de Solicitudes
Route::get('/rejectionAlert/{user_id}', [ApiController::class, 'rejectionAlert']);
Route::get('/acceptanceAlert/{user_id}', [ApiController::class, 'acceptanceAlert']);
Route::get('/approvedAlert/{user_id}', [ApiController::class, 'approvedAlert']);
