<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Tugas;
use App\Models\Jawaban;
use App\Models\Tingkat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Barryvdh\DomPDF\Facade as PDF;

class JawabanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tingkat = Tingkat::all();
        return view('jawaban.index', compact(['tingkat']));
    }

    public function tingkat($id)
    {
        $tugas =  Tugas::where('id_tingkat', '=', $id)->orderBy('id_mapel')->get();
        return view('jawaban.tingkat', compact(['tugas']));
    }

    public function jawabanPDF($id, $tgs)
    {
        $finished = User::whereHas('jawaban', function (Builder $query) use ($tgs) {
            $query->where('id_tugas', '=', $tgs);
        })->whereHas('tingkat', function (Builder $query) use ($id) {
            $query->where('id_tingkat', '=', $id);
        })->get();

        $tugas =  Tugas::with(['tingkat'])->where('id_tingkat', '=', $id)->where('id', '=', $tgs)->get();

        $id_tingkat =  Tugas::with(['tingkat'])->where('id_tingkat', '=', $id)->where('id', '=', $tgs)->first();


        $unfinished = User::whereDoesntHave('jawaban', function (Builder $query) use ($tgs) {
            $query->where('id_tugas', '=', $tgs);
        })->whereHas('tingkat', function (Builder $query) use ($id) {
            $query->where('id_tingkat', '=', $id);
        })->get();

        $batas_pengantaran =  Tugas::where('id_tingkat', '=', $id)->where('id', '=', $tgs)->pluck('batas_pengantaran');
        $data = [];
        foreach ($finished as $f) {
            $data[] = $f->jawaban->where('id_tugas', '=', $tgs)->toArray();
        }
        $res = call_user_func_array('array_merge', $data);
        $json = json_encode($res);

        $pdf = PDF::loadview('jawaban.laporan', compact(['finished', 'unfinished', 'tugas', 'res', 'batas_pengantaran', 'id_tingkat']));
        return $pdf->stream();
    }

    public function tugas($id, $tgs)
    {
        $finished = User::whereHas('jawaban', function (Builder $query) use ($tgs) {
            $query->where('id_tugas', '=', $tgs);
        })->whereHas('tingkat', function (Builder $query) use ($id) {
            $query->where('id_tingkat', '=', $id);
        })->get();

        $tugas =  Tugas::with(['tingkat'])->where('id_tingkat', '=', $id)->where('id', '=', $tgs)->get();

        $id_tingkat =  Tugas::with(['tingkat'])->where('id_tingkat', '=', $id)->where('id', '=', $tgs)->first();


        $unfinished = User::whereDoesntHave('jawaban', function (Builder $query) use ($tgs) {
            $query->where('id_tugas', '=', $tgs);
        })->whereHas('tingkat', function (Builder $query) use ($id) {
            $query->where('id_tingkat', '=', $id);
        })->get();

        $batas_pengantaran =  Tugas::where('id_tingkat', '=', $id)->where('id', '=', $tgs)->pluck('batas_pengantaran');
        $data = [];
        foreach ($finished as $f) {
            $data[] = $f->jawaban->where('id_tugas', '=', $tgs)->toArray();
        }
        $res = call_user_func_array('array_merge', $data);
        $json = json_encode($res);

        return view('jawaban.tugas', compact(['finished', 'unfinished', 'tugas', 'res', 'batas_pengantaran', 'id_tingkat']))->with('flash', 'Jawaban Berhasil Dihapus');
    }

    public function jawaban($siswa, $tgs)
    {
        $jawaban = Jawaban::where('id_siswa', '=', $siswa)->where('id_tugas', '=', $tgs)->get();
        return view('jawaban.detail-jawaban', compact(['jawaban']));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy_jawaban($tingkat, $tgs, $jawaban)
    {
        Jawaban::findOrFail($jawaban)->delete();
        return redirect()->route('jawaban-siswa', ['tgs' => $tgs, 'id' => $tingkat])->with('flash', 'Jawaban Berhasil Dihapus');
    }
}
