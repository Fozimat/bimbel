<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\TugasController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\TingkatController;

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

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('mapel', MapelController::class);
    Route::resource('tingkat', TingkatController::class);
    Route::resource('materi', MateriController::class);
    Route::resource('tugas', TugasController::class)->parameters(['tugas' => 'tugas']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
