<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\JawabanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\TugasController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TingkatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\DashboardController;
use App\Http\Controllers\Siswa\MateriSiswaController;
use App\Http\Controllers\Siswa\TugasSiswaController;

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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/', [DashboardAdminController::class, 'index'])->name('dashboard');
    Route::get('siswa/laporan', [SiswaController::class, 'siswaPDF'])->name('siswa.pdf');
    Route::resource('siswa', SiswaController::class);
    Route::get('mapel/laporan', [MapelController::class, 'mapelPDF'])->name('mapel.pdf');
    Route::resource('mapel', MapelController::class);
    Route::get('tingkat/laporan', [TingkatController::class, 'tingkatPDF'])->name('tingkat.pdf');
    Route::resource('tingkat', TingkatController::class);
    Route::get('materi/laporan', [MateriController::class, 'materiPDF'])->name('materi.pdf');
    Route::resource('materi', MateriController::class);
    Route::get('tugas/laporan', [TugasController::class, 'tugasPDF'])->name('tugas.pdf');
    Route::resource('tugas', TugasController::class)->parameters(['tugas' => 'tugas']);
    Route::delete('siswa/jawaban/{jawaban}/{id_siswa}', [SiswaController::class, 'destroy_jawaban'])->name('hapus.jawaban');
    Route::get('jawaban/tingkat/{id}/tugas/{tgs}/laporan', [JawabanController::class, 'jawabanPDF'])->name('jawaban.pdf');
    Route::resource('jawaban', JawabanController::class)->except(['destroy']);
    Route::get('jawaban/tingkat/{id}', [JawabanController::class, 'tingkat'])->name('jawaban-tingkat');
    Route::delete('jawaban/tingkat/{tingkat}/tugas/{tgs}/jawaban/{jawaban}', [JawabanController::class, 'destroy_jawaban'])->name('hapus.jawaban.tingkat');
    Route::get('jawaban/tingkat/{id}/tugas/{tgs}', [JawabanController::class, 'tugas'])->name('jawaban-siswa');
    Route::get('jawaban/{siswa}/tugas/{tgs}', [JawabanController::class, 'jawaban'])->name('detail-jawaban-siswa');
    Route::get('siswa/jawaban/{id_siswa}', [SiswaController::class, 'jawaban'])->name('admin-jawaban-siswa');
});

Auth::routes();

Route::prefix('siswa')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('siswa-dashboard');
    Route::resource('materisiswa', MateriSiswaController::class);
    Route::get('/tugassiswa/ubah/tugas/{tugas}/jawaban/{jawaban}', [TugasSiswaController::class, 'ubah'])->name('tugassiswa.ubah');
    Route::resource('tugassiswa', TugasSiswaController::class, ['except' => ['destoy']]);
    Route::get('/deletetugas/{jawaban}', [TugasSiswaController::class, 'destroy'])->name('deletetugas');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/ganti-password', [ProfileController::class, 'ganti_password'])->name('ganti-password');
    Route::post('/ganti-password', [ProfileController::class, 'store'])->name('ganti-password-post');
    Route::get('/ganti-profile', [ProfileController::class, 'ganti_profile'])->name('ganti-profile');
    Route::post('/ganti-profile', [ProfileController::class, 'change'])->name('ganti-profile-post');
});
