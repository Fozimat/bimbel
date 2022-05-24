<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Mapel;
use App\Models\Tugas;
use App\Models\Jawaban;
use App\Models\Tingkat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = User::with('tingkat')->where('role', 'siswa')->get();
        return view('siswa-admin.index', compact(['siswa']));
    }

    public function siswaPDF()
    {
        $siswa = User::with('tingkat')->where('role', 'siswa')->get();
        $pdf = PDF::loadview('siswa-admin.laporan', compact(['siswa']))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function jawaban($id_siswa)
    {
        $mapel_finished =  Mapel::whereHas('tugas')->whereHas('jawaban', function (Builder $query) use ($id_siswa) {
            $query->where('id_siswa', '=', $id_siswa);
        })->get();

        $mapel_unfinished = Mapel::whereHas('tugas')->whereDoesntHave('jawaban', function (Builder $query) use ($id_siswa) {
            $query->where('id_siswa', '=', $id_siswa);
        })->get();

        $tingkat_siswa = User::find($id_siswa)->tingkat->id;
        $id_siswa = User::find($id_siswa)->id;
        $nama_siswa = User::find($id_siswa)->nama;

        $all =  Tugas::whereHas('mapel', function (Builder $query) use ($tingkat_siswa) {
            $query->where('id_tingkat', '=', $tingkat_siswa);
        })->groupBy('id_mapel')->get();

        $finished =  Tugas::whereHas('mapel')
            ->whereHas('jawaban', function (Builder $query) use ($id_siswa) {
                $query->where('id_siswa', '=', $id_siswa);
            })
            ->whereHas('tingkat', function (Builder $query)  use ($tingkat_siswa) {
                $query->where('id_tingkat', '=', $tingkat_siswa);
            })->get();

        $unfinished =  Tugas::whereHas('mapel')
            ->whereDoesntHave('jawaban', function (Builder $query) use ($id_siswa) {
                $query->where('id_siswa', '=', $id_siswa);
            })
            ->whereHas('tingkat', function (Builder $query) use ($tingkat_siswa) {
                $query->where('id_tingkat', '=', $tingkat_siswa);
            })->orderBy('id_mapel')->get();

        $id_tugas_finished = [];
        foreach ($finished as $tugas) {
            $id_tugas_finished[] = $tugas->id;
        }

        $id_tugas_unfinished = [];
        foreach ($unfinished as $tugas) {
            $id_tugas_unfinished[] = $tugas->id;
        }

        return view('siswa-admin.tugas', compact(['all', 'finished', 'unfinished', 'id_tugas_finished', 'id_tugas_unfinished',  'mapel_finished', 'mapel_unfinished', 'tingkat_siswa', 'nama_siswa', 'id_siswa']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $siswa)
    {
        $tingkat = Tingkat::all();
        return view('siswa-admin.edit', compact(['siswa', 'tingkat']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $siswa)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $siswa->id],
            'id_tingkat' => ['required']
        ]);
        $siswa->update($request->all());
        return redirect()->route('siswa.index')->with('flash', 'Siswa Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $siswa)
    {
        $siswa->jawaban()->delete();
        $siswa->delete();
        return redirect()->route('siswa.index')->with('flash', 'Siswa Berhasil Dihapus');
    }

    public function destroy_jawaban(Jawaban $jawaban, $id_siswa)
    {
        $jawaban->delete();
        return redirect()->route('admin-jawaban-siswa', $id_siswa)->with('flash', 'Jawaban Berhasil Dihapus');
    }
}
