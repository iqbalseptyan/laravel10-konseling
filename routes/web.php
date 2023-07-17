<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('auth/login');
    Route::post('/', 'authenticate')->name('auth/authenticate');
});

Route::get('/logout', [LogoutController::class, 'logout']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin/dashboard');

    Route::controller(KelasController::class)->group(function () {
        Route::get('kelas', 'index')->name('admin/kelas');

        Route::get('kelas/tambah', 'create')->name('admin/kelas/tambah');
        Route::post('kelas/simpan', 'store')->name('admin/kelas/simpan');

        Route::get('kelas/ubah/{kelas}', 'edit')->name('admin/kelas/ubah');
        Route::patch('kelas/perbarui/{kelas}', 'update')->name('admin/kelas/perbarui');

        Route::delete('kelas/hapus/{kelas}', 'destroy')->name('admin/kelas/hapus');
    });

    Route::controller(SiswaController::class)->group(function () {
        Route::get('siswa', 'index')->name('admin/siswa');

        Route::get('siswa/tambah', 'create')->name('admin/siswa/tambah');
        Route::post('siswa/simpan', 'store')->name('admin/siswa/simpan');

        Route::get('siswa/ubah/{siswa}', 'edit')->name('admin/siswa/ubah');
        Route::patch('siswa/perbarui/{siswa}', 'update')->name('admin/siswa/perbarui');

        Route::delete('siswa/hapus/{siswa}', 'destroy')->name('admin/siswa/hapus');
    });
});
