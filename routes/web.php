<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesainController;
use App\Http\Controllers\Admin\KonsepController;
use App\Http\Controllers\Admin\SayembaraController as AdminSayembaraController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Arsitek\DashboardController as ArsitekDashboardController;
use App\Http\Controllers\Arsitek\PortofolioController;
use App\Http\Controllers\Pelanggan\DashboardController as PelangganDashboardController;

use App\Http\Controllers\Arsitek\ProfilController as ProfilArsitek;
use App\Http\Controllers\Arsitek\SayembaraController as ArsitekSayembaraController;
use App\Http\Controllers\Pelanggan\PembayaranController;
use App\Http\Controllers\Pelanggan\ProfilController as ProfilPelanggan;
use App\Http\Controllers\Pelanggan\SayembaraController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.landing');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
        //dashboard
        Route::get('/', DashboardController::class)->name('admin.dashboard');

        //verifikasi
        Route::get('/arsitek', [UserController::class, 'arsitek'])->name('arsitek.verif.index');
        Route::get('/arsitek/detail/{id}', [UserController::class, 'show'])->name('arsitek.verif.detail');
        Route::get('/pelanggan', [UserController::class, 'pelanggan'])->name('pelanggan.verif.index');
        Route::get('/sayembara', [AdminSayembaraController::class, 'index'])->name('sayembara.verif.index');
        Route::get('/pembayaran/detail/{id}', [AdminSayembaraController::class, 'pembayaran'])->name('sayembara.verif.pembayaran');

        // Konsep
        Route::get('/konsep', [KonsepController::class, 'index'])->name('konsep.index');
        Route::get('/konsep/create', [KonsepController::class, 'create'])->name('konsep.create');
        Route::get('/konsep/edit/{id}', [KonsepController::class, 'edit'])->name('konsep.edit');
        Route::get('/konsep/detail/{id}', [KonsepController::class, 'show'])->name('konsep.detail');
    });

    Route::group(['prefix' => 'arsitek', 'middleware' => ['role:arsitek']], function () {
        //dashboard
        Route::get('/', ArsitekDashboardController::class)->name('arsitek.dashboard');

        //profil
        Route::get('/profil', ProfilArsitek::class)->name('arsitek.profil');
        Route::get('/profil/edit', [ProfilArsitek::class, 'edit'])->name('arsitek.edit');

        //sayembara
        Route::get('/sayembara', [ArsitekSayembaraController::class, 'index'])->name('sayembara.index');
        Route::get('/sayembara/detail/{id}', [ArsitekSayembaraController::class, 'detail'])->name('sayembara.detail');

        //Desain
        Route::get('/desain', DesainController::class)->name('desain.index');
        Route::get('/desain/create', [DesainController::class, 'create'])->name('desain.create');

        //Portofolio
        Route::get('/portofolio', PortofolioController::class)->name('portofolio.index');
        Route::get('/portofolio/create', [PortofolioController::class, 'create'])->name('portofolio.create');
    });

    Route::group(['prefix' => 'pelanggan', 'middleware' => ['role:pelanggan']], function () {
        //dashboard
        Route::get('/', PelangganDashboardController::class)->name('pelanggan.dashboard');

        //profil
        Route::get('/profil', ProfilPelanggan::class)->name('pelanggan.profil');
        Route::get('/profil/edit', [ProfilPelanggan::class, 'edit'])->name('pelanggan.edit');

        //sayembara
        Route::get('/sayembara', SayembaraController::class)->name('pelanggan.sayembara.index');
        Route::get('/sayembara/detail/{id}', [SayembaraController::class, 'detail'])->name('pelanggan.sayembara.detail');
        Route::get('/sayembara/tambah', [SayembaraController::class, 'create'])->name('pelanggan.sayembara.create');

        //Pembayaran
        Route::get('sayembara/pembayaran', PembayaranController::class)->name('pelanggan.pembayaran.index');
        Route::get('sayembara/pembayaran/detail/{id}', [PembayaranController::class, 'detail'])->name('pelanggan.pembayaran.detail');
        Route::get('sayembara/{id}/pembayaran/tambah', [PembayaranController::class, 'create'])->name('pelanggan.pembayaran.create');
    });
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
