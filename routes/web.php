<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratDokumenController;
use App\Http\Controllers\ProfilPengurusController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/berita/{kegiatan}', function (\App\Models\Kegiatan $kegiatan) {
    return view('berita.show', compact('kegiatan'));
})->name('berita.show');

Route::get('/profilpengurusdtr', [ProfilPengurusController::class, 'index'])
    ->name('profil.pengurus');

Route::get('/', function () {

    $kegiatan = \App\Models\Kegiatan::latest()
        ->take(3)
        ->get();

    return view('home', compact('kegiatan'));

});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('anggota', AnggotaController::class);
    Route::resource('pengurus', PengurusController::class);
    Route::resource('donatur', DonaturController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('laporan', LaporanController::class);
    Route::resource('inventaris', InventarisController::class);
    Route::resource('surat-dokumen', SuratDokumenController::class);

});

require __DIR__.'/auth.php';