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
        $all =  Mapel::whereHas('tugas')->get();
        $finished = Tugas::whereHas('jawaban')->get();
        $unfinished = Tugas::doesntHave('jawaban')->groupBy('id_mapel')->get();

        dd($finished->toArray(), $unfinished->toArray());

        return view('siswa.tugas', compact(['all', 'finished', 'unfinished']));
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
