<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KonselorController;
use App\Http\Controllers\Admin\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Konselor\DashboardController as KonselorDashboardController;
use App\Http\Controllers\Konselor\JadwalBimbinganController;
use App\Http\Controllers\Konselor\KasusController;
use App\Http\Controllers\Konselor\KasusSiswaController;
use App\Http\Controllers\Konselor\KomentarPesanController;
use App\Http\Controllers\Konselor\KonselingController;
use App\Http\Controllers\Konselor\LaporanController;
use App\Http\Controllers\Konselor\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilSiswaController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\JadwalBimbinganController as SiswaJadwalBimbinganController;
use App\Http\Controllers\Siswa\KasusSiswaController as SiswaKasusSiswaController;
use App\Http\Controllers\Siswa\KomentarPesanController as SiswaKomentarPesanController;
use App\Http\Controllers\Siswa\KonselingController as SiswaKonselingController;
use App\Http\Controllers\Siswa\PesanController as SiswaPesanController;
use App\Http\Controllers\Siswa\PesertaBimbinganController;
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

Route::get('logout', [LogoutController::class, 'logout'])->name('auth/logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin/dashboard');

    Route::controller(PengumumanController::class)->group(function () {
        Route::get('pengumuman', 'index')->name('admin/pengumuman');

        Route::get('pengumuman/tambah', 'create')->name('admin/pengumuman/tambah');
        Route::post('pengumuman/simpan', 'store')->name('admin/pengumuman/simpan');

        Route::get('pengumuman/ubah/{pengumuman}', 'edit')->name('admin/pengumuman/ubah');
        Route::patch('pengumuman/perbarui/{pengumuman}', 'update')->name('admin/pengumuman/perbarui');

        Route::delete('pengumuman/hapus/{pengumuman}', 'destroy')->name('admin/pengumuman/hapus');

        Route::get('pengumuman/detail/{pengumuman}', 'show')->name('admin/pengumuman/detail');
    });

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

    Route::controller(KonselorController::class)->group(function () {
        Route::get('konselor', 'index')->name('admin/konselor');

        Route::get('konselor/tambah', 'create')->name('admin/konselor/tambah');
        Route::post('konselor/simpan', 'store')->name('admin/konselor/simpan');

        Route::get('konselor/ubah/{konselor}/{user}', 'edit')->name('admin/konselor/ubah');
        Route::patch('konselor/perbarui/{konselor}', 'update')->name('admin/konselor/perbarui');

        Route::delete('konselor/hapus/{konselor}', 'destroy')->name('admin/konselor/hapus');
    });

    Route::controller(AdminLaporanController::class)->group(function () {
        Route::get('laporan', 'index')->name('admin/laporan');

        Route::get('laporan/tambah', 'create')->name('admin/laporan/tambah');
        Route::post('laporan/simpan', 'store')->name('admin/laporan/simpan');

        Route::get('laporan/ubah/{laporan}', 'edit')->name('admin/laporan/ubah');
        Route::patch('laporan/perbarui/{laporan}', 'update')->name('admin/laporan/perbarui');

        Route::delete('laporan/hapus/{laporan}', 'destroy')->name('admin/laporan/hapus');
    });
});

Route::group(['prefix' => 'konselor', 'middleware' => ['auth', 'konselor']], function () {
    Route::controller(KonselorDashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('konselor/dashboard');
    });

    Route::controller(KasusController::class)->group(function () {
        Route::get('kasus', 'index')->name('konselor/kasus');

        Route::get('kasus/tambah', 'create')->name('konselor/kasus/tambah');
        Route::post('kasus/simpan', 'store')->name('konselor/kasus/simpan');

        Route::get('kasus/ubah/{kasus}', 'edit')->name('konselor/kasus/ubah');
        Route::patch('kasus/perbarui/{kasus}', 'update')->name('konselor/kasus/perbarui');

        Route::delete('kasus/hapus/{kasus}', 'destroy')->name('konselor/kasus/hapus');
    });

    Route::controller(KasusSiswaController::class)->group(function () {
        Route::get('kasus-siswa', 'index')->name('konselor/kasus-siswa');

        Route::get('kasus-siswa/tambah', 'create')->name('konselor/kasus-siswa/tambah');
        Route::post('kasus-siswa/simpan', 'store')->name('konselor/kasus-siswa/simpan');

        Route::get('kasus-siswa/ubah/{kasusSiswa}', 'edit')->name('konselor/kasus-siswa/ubah');
        Route::patch('kasus-siswa/perbarui/{kasusSiswa}', 'update')->name('konselor/kasus-siswa/perbarui');

        Route::delete('kasus-siswa/hapus/{kasusSiswa}', 'destroy')->name('konselor/kasus-siswa/hapus');
    });

    Route::controller(JadwalBimbinganController::class)->group(function () {
        Route::get('jadwal-bimbingan', 'index')->name('konselor/jadwal-bimbingan');

        Route::get('jadwal-bimbingan/tambah', 'create')->name('konselor/jadwal-bimbingan/tambah');
        Route::post('jadwal-bimbingan/simpan', 'store')->name('konselor/jadwal-bimbingan/simpan');

        Route::get('jadwal-bimbingan/ubah/{jadwalBimbingan}', 'edit')->name('konselor/jadwal-bimbingan/ubah');
        Route::patch('jadwal-bimbingan/perbarui/{jadwalBimbingan}', 'update')->name('konselor/jadwal-bimbingan/perbarui');

        Route::delete('jadwal-bimbingan/hapus/{jadwalBimbingan}', 'destroy')->name('konselor/jadwal-bimbingan/hapus');
    });

    Route::controller(PesanController::class)->group(function () {
        Route::get('pesan-masuk', 'pesan_masuk')->name('konselor/pesan-masuk');

        Route::get('pesan-keluar', 'pesan_keluar')->name('konselor/pesan-keluar');

        Route::get('pesan-keluar/tambah', 'pesan_keluar_create')->name('konselor/pesan-keluar/tambah');
        Route::post('pesan-keluar/simpan', 'pesan_keluar_store')->name('konselor/pesan-keluar/simpan');
    });

    Route::controller(KomentarPesanController::class)->group(function () {
        Route::get('komentar-pesan/{pesan}', 'pesan')->name('konselor/komentar-pesan');

        Route::post('komentar-pesan/{pesan}', 'pesan_store')->name('konselor/komentar-pesan/simpan');
    });

    Route::controller(KonselingController::class)->group(function () {
        Route::get('konseling', 'index')->name('konselor/konseling');

        Route::get('konseling/tambah', 'create')->name('konselor/konseling/tambah');
        Route::post('konseling/simpan', 'store')->name('konselor/konseling/simpan');

        Route::get('konseling/ubah/{konseling}', 'edit')->name('konselor/konseling/ubah');
        Route::patch('konseling/perbarui/{konseling}', 'update')->name('konselor/konseling/perbarui');

        Route::delete('konseling/hapus/{konseling}', 'destroy')->name('konselor/konseling/hapus');
    });

    Route::controller(LaporanController::class)->group(function () {
        Route::get('laporan', 'index')->name('konselor/laporan');

        Route::get('laporan/tambah', 'create')->name('konselor/laporan/tambah');
        Route::post('laporan/simpan', 'store')->name('konselor/laporan/simpan');

        Route::get('laporan/ubah/{laporan}', 'edit')->name('konselor/laporan/ubah');
        Route::patch('laporan/perbarui/{laporan}', 'update')->name('konselor/laporan/perbarui');

        Route::delete('laporan/hapus/{laporan}', 'destroy')->name('konselor/laporan/hapus');
    });
});

Route::group(['prefix' => 'siswa', 'middleware' => ['auth', 'siswa']], function () {
    Route::controller(SiswaDashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('siswa/dashboard');
    });

    Route::controller(SiswaKasusSiswaController::class)->group(function () {
        Route::get('kasus-siswa', 'index')->name('siswa/kasus-siswa');
    });

    Route::controller(SiswaJadwalBimbinganController::class)->group(function () {
        Route::get('jadwal-bimbingan', 'index')->name('siswa/jadwal-bimbingan');
    });

    Route::controller(PesertaBimbinganController::class)->group(function () {
        Route::post('peserta-bimbingan', 'store')->name('siswa/peserta-bimbingan/simpan');
    });

    Route::controller(SiswaPesanController::class)->group(function () {
        Route::get('pesan-masuk', 'pesan_masuk')->name('siswa/pesan-masuk');

        Route::get('pesan-keluar', 'pesan_keluar')->name('siswa/pesan-keluar');

        Route::get('pesan-keluar/tambah', 'pesan_keluar_create')->name('siswa/pesan-keluar/tambah');
        Route::post('pesan-keluar/simpan', 'pesan_keluar_store')->name('siswa/pesan-keluar/simpan');
    });

    Route::controller(SiswaKomentarPesanController::class)->group(function () {
        Route::get('komentar-pesan/{pesan}', 'pesan')->name('siswa/komentar-pesan');

        Route::post('komentar-pesan/{pesan}', 'pesan_store')->name('siswa/komentar-pesan/simpan');
    });

    Route::controller(SiswaKonselingController::class)->group(function () {
        Route::get('konseling', 'index')->name('siswa/konseling');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index')->name('profile');

        Route::patch('profile/password', 'update_password')->name('profile/password');

        Route::patch('profile/foto', 'update_foto')->name('profile/foto');
    });

    Route::controller(ProfilSiswaController::class)->group(function () {
        Route::get('profile/siswa/{siswa}', 'index')->name('profile/siswa');
    });
});
