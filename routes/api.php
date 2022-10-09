<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\InformasiController;
use App\Http\Controllers\API\JadwalLatihanController;
use App\Http\Controllers\API\PelatihController;
use App\Http\Controllers\API\PembayaranController;
use App\Http\Controllers\API\PerkembanganSiswaController;
use App\Http\Controllers\API\SiswaController;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login'])->name('api.login');
Route::post('register', [AuthController::class, 'register'])->name('api.register');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');

    Route::get('pelatih', [PelatihController::class, 'index'])->name('api.getPelatih');
    Route::put('pelatih/{id}/update', [PelatihController::class, 'update'])->name('api.updatePelatih');

    Route::get('siswa', [SiswaController::class, 'index'])->name('api.getSiswa');
    Route::get('siswa/{id}/show', [SiswaController::class, 'show'])->name('api.showSiswa');
    Route::put('siswa/{id}/update', [SiswaController::class, 'update'])->name('api.updateSiswa');

    Route::post('pembayaran', [PembayaranController::class, 'store'])->name('api.storePembayaran');

    Route::get('informasi', [InformasiController::class, 'index'])->name('api.getInformasi');

    Route::get('jadwal-latihan', [JadwalLatihanController::class, 'index'])->name('api.getJadwalLatihan');
    Route::post('jadwal-latihan', [JadwalLatihanController::class, 'store'])->name('api.storeJadwalLatihan');
    Route::put('jadwal-latihan/{id}/update', [JadwalLatihanController::class, 'update'])->name('api.updateJadwalLatihan');

    Route::get('perkembangan-siswa', [PerkembanganSiswaController::class, 'index'])->name('api.getPerkembanganSiswa');
    Route::get('perkembangan-siswa/{id}', [PerkembanganSiswaController::class, 'bySiswa'])->name('api.getPerkembanganSiswaBySiswa');
    Route::post('perkembangan-siswa', [PerkembanganSiswaController::class, 'store'])->name('api.storePerkembanganSiswa');
    Route::put('perkembangan-siswa/{id}/update', [PerkembanganSiswaController::class, 'update'])->name('api.updatePerkembanganSiswa');

});
