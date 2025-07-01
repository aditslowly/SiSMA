<?php

use App\Http\Controllers\Guru\DashboardController;
use App\Http\Controllers\Guru\Kelas\WaliKelasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'dashboard']);

/* Routing Kelas Guru */
Route::get('kelas', [WaliKelasController::class, 'index']);
Route::get('kelas/create', [WaliKelasController::class, 'create']);
