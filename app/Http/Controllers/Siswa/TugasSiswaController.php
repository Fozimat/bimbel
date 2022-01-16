<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Mapel;
use App\Models\Tugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TugasSiswaRequest;
use App\Models\Jawaban;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class TugasSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel_selesai_tugas =  Mapel::whereHas('tugas', function (Builder $query) {
            $query->where('id_tingkat', '=', Auth::user()->id_tingkat)
                ->orderBy('id_mapel');
        })->get();
        $mapel_belum_selesai_tugas =  Mapel::whereHas('tugas', function (Builder $query) {
            $query->doesntHave('jawaban');
        })->get();
        $daftar_tugas_belum_selesai = Tugas::doesntHave('jawaban')->get();
        // dd($mapel_belum_selesai_tugas);
        return view('siswa.tugas', compact(['mapel_belum_selesai_tugas', 'daftar_tugas_belum_selesai', 'mapel_selesai_tugas']));
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
    public function store(TugasSiswaRequest $request)
    {
        $data = [
            'id_tugas' => $request->id_tugas,
            'id_siswa' => Auth::user()->id,
            'jawaban' => $request->jawaban,
        ];
        Jawaban::create($data);
        return redirect()->route('tugassiswa.index')->with('flash', 'Tugas Berhasil Dikumpulkan');
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
    public function edit(Tugas $tugassiswa)
    {
        // dd($tugassiswa);
        return view('siswa.kumpul-tugas', compact(['tugassiswa']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TugasSiswaRequest $request, Tugas $tugassiswa)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
