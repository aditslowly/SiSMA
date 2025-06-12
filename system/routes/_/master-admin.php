<?php

use App\Http\Controllers\MasterAdmin\Admin\AdminController;
use App\Http\Controllers\MasterAdmin\DashboardController;
use App\Http\Controllers\MasterAdmin\Sekolah\SekolahController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'dashboard']);
Route::get('profil', [DashboardController::class, 'profil'])->name('profil');
Route::put('profil/{id}', [DashboardController::class, 'update'])->name('profil.update');

// Router data admin
// Route::get('data-admin', [AdminController::class, 'index'])->name('master-admin');
// Route::get('data-admin/create', [AdminController::class, 'create'])->name('master-admin');
// Route::post('data-admin', [AdminController::class, 'store'])->name('master-admin');
// Route::get('data-admin/detail/{id}', [AdminController::class, 'show'])->name('master-admin');
// Route::get('data-admin/edit/{id}', [AdminController::class, 'edit'])->name('master-admin');
// Route::put('data-admin/{id}', [AdminController::class, 'update'])->name('master-admin');
// Route::delete('data-admin/destroy/{id}', [AdminController::class, 'destroy'])->name('master-admin');

Route::get('data-admin', [AdminController::class, 'index'])->name('data-admin.index');
Route::get('data-admin/create', [AdminController::class, 'create'])->name('data-admin.create');
Route::post('data-admin', [AdminController::class, 'store'])->name('data-admin.store');
Route::get('data-admin/detail/{id}', [AdminController::class, 'show'])->name('data-admin.show');
Route::get('data-admin/edit/{id}', [AdminController::class, 'edit'])->name('data-admin.edit');
Route::put('data-admin/{id}', [AdminController::class, 'update'])->name('data-admin.update');
Route::delete('data-admin/destroy/{id}', [AdminController::class, 'destroy'])->name('data-admin.destroy');


// Router data sekolah
Route::get('data-sekolah', [SekolahController::class, 'index'])->name('master-admin');
Route::get('data-sekolah/create', [SekolahController::class, 'create'])->name('master-admin');
Route::post('data-sekolah', [SekolahController::class, 'store'])->name('master-admin');
Route::get('data-sekolah/detail/{id}', [SekolahController::class, 'show'])->name('master-admin');
Route::get('data-sekolah/edit/{id}', [SekolahController::class, 'edit'])->name('master-admin');
Route::put('data-sekolah/{id}', [SekolahController::class, 'update'])->name('master-admin');
Route::delete('data-sekolah/destroy/{id}', [SekolahController::class, 'destroy'])->name('master-admin');
