<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Tugas;
use App\Models\Materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    public function index()
    {
        $total_materi = Materi::where('id_tingkat', '=', Auth::user()->id_tingkat)->count();
        $total_tugas =  Tugas::where('id_tingkat', '=', Auth::user()->id_tingkat)->count();
        $total_tugas_finished =  Tugas::whereHas('mapel')
            ->whereHas('jawaban', function (Builder $query) {
                $query->where('id_siswa', '=', Auth::user()->id);
            })
            ->whereHas('tingkat', function (Builder $query) {
                $query->where('id_tingkat', '=', Auth::user()->id_tingkat);
            })->count();
        $total_tugas_unfinished =  Tugas::whereHas('mapel')
            ->whereDoesntHave('jawaban', function (Builder $query) {
                $query->where('id_siswa', '=', Auth::user()->id);
            })
            ->whereHas('tingkat', function (Builder $query) {
                $query->where('id_tingkat', '=', Auth::user()->id_tingkat);
            })->count();
        $daftar_tugas_unfinished =  Tugas::whereHas('mapel')
            ->whereDoesntHave('jawaban', function (Builder $query) {
                $query->where('id_siswa', '=', Auth::user()->id);
            })
            ->whereHas('tingkat', function (Builder $query) {
                $query->where('id_tingkat', '=', Auth::user()->id_tingkat);
            })->get();
        return view('siswa.dashboard', compact(['total_materi', 'total_tugas', 'total_tugas_finished', 'total_tugas_unfinished', 'daftar_tugas_unfinished']));
    }
}
