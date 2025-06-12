<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Guru\GuruController;
use App\Http\Controllers\Admin\Kelas\KelasController;
use App\Http\Controllers\Admin\Mapel\MapelController;
use App\Http\Controllers\Admin\Siswa\SiswaController;
use App\Http\Controllers\Admin\TahunAjar\TahunAjarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'dashboard']);
Route::get('profil', [DashboardController::class, 'profil'])->name('profil');
Route::put('profil/{id}', [DashboardController::class, 'update'])->name('profil.update');

// Data Guru Routes
Route::get('guru', [GuruController::class, 'index'])->name('guru');
Route::get('guru/create', [GuruController::class, 'create'])->name('guru.create');
Route::get('guru/import', [GuruController::class, 'import'])->name('guru.import');
Route::post('guru/export', [GuruController::class, 'export'])->name('guru.export');
Route::post('guru/import', [GuruController::class, 'import'])->name('guru.import');
Route::get('guru/export', [GuruController::class, 'export'])->name('guru.export');
Route::post('guru', [GuruController::class, 'store'])->name('guru');
Route::get('guru/detail/{id}', [GuruController::class, 'show'])->name('guru.show');
Route::get('guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
Route::put('guru/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::delete('guru/destroy/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');

// Data Siswa Routes
Route::get('siswa', [SiswaController::class, 'index'])->name('siswa');
Route::post('siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
Route::get('siswa/export', [SiswaController::class, 'export'])->name('siswa.export');
Route::post('siswa/export', [SiswaController::class, 'export'])->name('siswa.export');
Route::get('siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('siswa/detail/{id}', [SiswaController::class, 'show'])->name('siswa.show');
Route::get('siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

// Data Mata Pelajaran Routes
Route::get('mata-pelajaran', [MapelController::class, 'index'])->name('mata-pelajaran');
Route::get('mata-pelajaran/create', [MapelController::class, 'create'])->name('mata-pelajaran.create');
Route::post('mata-pelajaran', [MapelController::class, 'store'])->name('mata-pelajaran.store');
Route::get('mata-pelajaran/export', [MapelController::class, 'export'])->name('mata-pelajaran.export');
Route::get('mata-pelajaran/edit/{id}', [MapelController::class, 'edit'])->name('mata-pelajaran.edit');
Route::put('mata-pelajaran/{id}', [MapelController::class, 'update'])->name('mata-pelajaran.update');
Route::delete('mata-pelajaran/destroy/{id}', [MapelController::class, 'destroy'])->name('mata-pelajaran.destroy');

// Data Kelas Routes
Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
Route::get('kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::post('kelas', [KelasController::class, 'store'])->name('kelas.store');
Route::get('kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
Route::put('kelas/{id}', [KelasController::class, 'update']);
Route::delete('kelas/destroy/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
Route::get('kelas/export', [KelasController::class, 'export']);

// Data Tahun ajar
Route::get('tahun-ajar', [TahunAjarController::class, 'index'])->name('tahun-ajar');
Route::get('tahun-ajar/create', [TahunAjarController::class, 'create'])->name('tahun-ajar.create');
Route::post('tahun-ajar', [TahunAjarController::class, 'store'])->name('tahun-ajar.store');
Route::get('tahun-ajar/show/{id}', [TahunAjarController::class, 'show']);
Route::get('tahun-ajar/edit', [TahunAjarController::class, 'edit']);
