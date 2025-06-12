<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Master Admin Routes

Route::prefix('master-admin')->middleware('auth:master-admin')->group(function(){
    include "_/master-admin.php";
});

// Admin Routes
Route::prefix('admin')->middleware('auth:admin')->group(function() {
    include "_/admin.php";
});

// Guru Routes
Route::prefix('guru')->middleware('auth:guru')->group(function() {
    include "_/guru.php";
});

// Auth Routes
Route::get('login', [AuthController::class, 'Login'])->name('login');
Route::post('login', [AuthController::class, 'LoginProses']);
Route::get('logout', [AuthController::class, 'Logout'])->name('logout');

Route::get('/add-admin', [AuthController::class, 'add']);
