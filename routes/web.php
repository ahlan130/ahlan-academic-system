<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

Route::get('/', [CVController::class, 'index']);
Route::get('/cv', [CVController::class, 'index']);
Route::get('/welcome-mahasiswa', function () {
    $jmlMahasiswa = \App\Models\Mahasiswa::count();
    $jmlMataKuliah = \App\Models\MataKuliah::count();
    return view('welcome_mahasiswa', compact('jmlMahasiswa', 'jmlMataKuliah'));
});
Route::post('/cv/upload-photo', [CVController::class, 'uploadPhoto'])->name('cv.upload-photo');
Route::delete('/cv/delete-photo', [CVController::class, 'deletePhoto'])->name('cv.delete-photo');

// Resourceful routes for Mahasiswa & Mata Kuliah
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('matakuliah', MataKuliahController::class);
