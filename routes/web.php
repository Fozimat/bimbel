<?php

use App\Http\Controllers\Admin\JawabanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\TugasController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TingkatController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('siswa', SiswaController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('tingkat', TingkatController::class);
    Route::resource('materi', MateriController::class);
    Route::resource('tugas', TugasController::class)->parameters(['tugas' => 'tugas']);
    Route::resource('jawaban', JawabanController::class);
    Route::get('jawaban/tingkat/{id}', [JawabanController::class, 'tingkat'])->name('jawaban-tingkat');
    Route::get('jawaban/tingkat/{id}/tugas/{tgs}', [JawabanController::class, 'tugas'])->name('jawaban-siswa');
});

Auth::routes();

Route::prefix('siswa')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('siswa-dashboard');
    Route::resource('materisiswa', MateriSiswaController::class);
    Route::resource('tugassiswa', TugasSiswaController::class);
});
