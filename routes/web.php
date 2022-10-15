<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataInformasiController;
use App\Http\Controllers\DataJadwalLatihanController;
use App\Http\Controllers\DataPelatihController;
use App\Http\Controllers\DataPembayaranController;
use App\Http\Controllers\DataPerkembanganSiswaController;
use App\Http\Controllers\DataSiswaController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->name('store');
});

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', BerandaController::class)->name('beranda');

    Route::group(['prefix' => 'data-admin', 'as' => 'data-admin.'], function(){
        Route::get('/{user}/profile', [DataAdminController::class, 'profile'])->name('profile');
        Route::put('/{user}/profile', [DataAdminController::class, 'updateProfile'])->name('updateProfile');
        Route::get('/{user}/ganti-password', [DataAdminController::class, 'gantiPassword'])->name('gantiPassword');
        Route::put('/{user}/ganti-password', [DataAdminController::class, 'updatePassword'])->name('updatePassword');
    });

    Route::group(['prefix' => 'data-pelatih', 'as' => 'data-pelatih.'], function(){
        Route::get('/', [DataPelatihController::class, 'index'])->name('index');
        Route::get('/tambah-pelatih', [DataPelatihController::class, 'create'])->name('create');
        Route::post('/ambah-pelatih', [DataPelatihController::class, 'store'])->name('store');
        Route::get('/{dataPelatih}/edit', [DataPelatihController::class, 'edit'])->name('edit');
        Route::put('/{dataPelatih}/edit', [DataPelatihController::class, 'update'])->name('update');
        Route::delete('/{dataPelatih}/delete', [DataPelatihController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'data-siswa', 'as' => 'data-siswa.'], function(){
        Route::get('/', [DataSiswaController::class, 'index'])->name('index');
        Route::get('/tambah-siswa', [DataSiswaController::class, 'create'])->name('create');
        Route::post('/tambah-siswa', [DataSiswaController::class, 'store'])->name('store');
        Route::get('/{dataSiswa}/show', [DataSiswaController::class, 'show'])->name('show');
        Route::get('/{dataSiswa}/edit', [DataSiswaController::class, 'edit'])->name('edit');
        Route::put('/{dataSiswa}/edit', [DataSiswaController::class, 'update'])->name('update');
        Route::delete('/{dataSiswa}/delete', [DataSiswaController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'data-pembayaran', 'as' => 'data-pembayaran.'], function(){
        Route::get('/', [DataPembayaranController::class, 'index'])->name('index');
        Route::get('/tambah-pembayaran', [DataPembayaranController::class, 'create'])->name('create');
        Route::post('/tambah-pembayaran', [DataPembayaranController::class, 'store'])->name('store');
        Route::get('/{dataPembayaran}/edit', [DataPembayaranController::class, 'edit'])->name('edit');
        Route::put('/{dataPembayaran}/edit', [DataPembayaranController::class, 'update'])->name('update');
        Route::delete('/{pembayaran}/delete', [DataPembayaranController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'data-informasi', 'as' => 'data-informasi.'], function(){
        Route::get('/', [DataInformasiController::class, 'index'])->name('index');
        Route::get('/tambah-informasi', [DataInformasiController::class, 'create'])->name('create');
        Route::post('/tambah-informasi', [DataInformasiController::class, 'store'])->name('store');
        Route::get('/{dataInformasi}/edit-informasi', [DataInformasiController::class, 'edit'])->name('edit');
        Route::put('/{dataInformasi}/edit-informasi', [DataInformasiController::class, 'update'])->name('update');
        Route::delete('/{dataInformasi}/delete', [DataInformasiController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'data-jadwal-latihan', 'as' => 'data-jadwal-latihan.'], function(){
        Route::get('/', [DataJadwalLatihanController::class, 'index'])->name('index');
        Route::get('/tambah-jadwal-latihan', [DataJadwalLatihanController::class, 'create'])->name('create');
        Route::post('/tambah-jadwal-latihan', [DataJadwalLatihanController::class, 'store'])->name('store');
        Route::get('/jadwal-altihan/{jadwalLatihan}/edit', [DataJadwalLatihanController::class, 'edit'])->name('edit');
        Route::put('/jadwal-altihan/{jadwalLatihan}/edit', [DataJadwalLatihanController::class, 'update'])->name('update');
        Route::delete('/{jadwalLatihan}/delete', [DataJadwalLatihanController::class, 'destroy'])->name('destroy');
    });
    
    Route::group(['prefix' => 'data-perkembangan-siswa', 'as' => 'data-perkembangan-siswa.'], function(){
        Route::get('/', [DataPerkembanganSiswaController::class, 'index'])->name('index');
        Route::get('/tambah-data-perkembangan-siswa', [DataPerkembanganSiswaController::class, 'create'])->name('create');
        Route::post('/tambah-data-perkembangan-siswa', [DataPerkembanganSiswaController::class, 'store'])->name('store');
        Route::get('/data-perkembangan-siswa/{dataPerkembanganSiswa}/edit', [DataPerkembanganSiswaController::class, 'edit'])->name('edit');
        Route::put('/data-perkembangan-siswa/{dataPerkembanganSiswa}/edit', [DataPerkembanganSiswaController::class, 'update'])->name('update');
        Route::delete('/{dataPerkembanganSiswa}/delete', [DataPerkembanganSiswaController::class, 'destroy'])->name('destroy');
    });
});



