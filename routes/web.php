<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kamu bisa mendaftarkan semua route web aplikasi.
| File ini otomatis dimuat oleh RouteServiceProvider dan semua
| route di dalamnya akan diberikan middleware "web".
|
*/

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::view('/home', 'view_home')->name('home');
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // =============================
    // 📚 Route untuk Data Buku
    // =============================
    Route::controller(BukuController::class)->group(function () {
        Route::get('/buku', 'bukutampil')->name('buku.tampil');
        Route::post('/buku/tambah', 'bukutambah')->name('buku.tambah');
        Route::put('/buku/edit/{id_buku}', 'bukuedit')->name('buku.edit');
        Route::delete('/buku/hapus/{id_buku}', 'bukuhapus')->name('buku.hapus');
    });

    // =============================
    // 👤 Route untuk Data Anggota
    // =============================
    Route::controller(AnggotaController::class)->group(function () {
        Route::get('/anggota', 'anggotatampil')->name('anggota.tampil');
        Route::post('/anggota/tambah', 'anggotatambah')->name('anggota.tambah');
        Route::put('/anggota/edit/{id_anggota}', 'anggotaedit')->name('anggota.edit');
        Route::delete('/anggota/hapus/{id_anggota}', 'anggotahapus')->name('anggota.hapus');
    });

    // =============================
    // 🧑‍💼 Route untuk Data Petugas
    // =============================
    Route::controller(PetugasController::class)->group(function () {
        Route::get('/petugas', 'petugastampil')->name('petugas.tampil');
        Route::post('/petugas/tambah', 'petugastambah')->name('petugas.tambah');
        Route::put('/petugas/edit/{id_petugas}', 'petugasedit')->name('petugas.edit');
        Route::delete('/petugas/hapus/{id_petugas}', 'petugashapus')->name('petugas.hapus');
    });

    // =============================
    // 🛒 Route untuk Data Pembelian
    // =============================
    Route::controller(PembelianController::class)->group(function () {
        Route::get('/pembelian', 'pembeliantampil')->name('pembelian.tampil');
        Route::post('/pembelian/tambah', 'pembeliantambah')->name('pembelian.tambah');
        Route::put('/pembelian/edit/{id_pembelian}', 'pembelianedit')->name('pembelian.edit');
        Route::delete('/pembelian/hapus/{id_pembelian}', 'pembelianhapus')->name('pembelian.hapus');
    });
});
