<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

// Notificaciones de Bandeja de Entrada
Route::get('/trayAlert/{role}', [ApiController::class, 'trayAlert']);
// Notificaciones de Reportes de CM Enviados
Route::get('/rcmAlert', [ApiController::class, 'RCMAlert']);
// Notificaciones de Solicitudes
Route::get('/rejectionAlert/{user_id}', [ApiController::class, 'rejectionAlert']);
Route::get('/acceptanceAlert/{user_id}', [ApiController::class, 'acceptanceAlert']);
Route::get('/approvedAlert/{user_id}', [ApiController::class, 'approvedAlert']);

//Notificaciones de Vales
Route::get('/acendalert/{user_id}', [ApiController::class, 'acendAlert']);
Route::get('/rejectionAlertVale/{user_id}', [ApiController::class, 'rejectionAlertVale']);
Route::get('/acceptanceAlertUT/{user_id}', [ApiController::class, 'acceptanceAlertUT']);
Route::get('/acceptanceAlertCP/{user_id}', [ApiController::class, 'acceptanceAlertCP']);
Route::get('/acceptanceAlertDA/{user_id}', [ApiController::class, 'acceptanceAlertDA']);
