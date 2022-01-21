<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Mapel;
use App\Models\Tugas;
use App\Models\Jawaban;
use App\Models\Tingkat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TugasSiswaRequest;
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

        // $finished = Tugas::whereHas('jawaban', function (Builder $query) {
        //     $query->where('id_siswa', '=', Auth::user()->id)
        //         ->where('id_tingkat', '=', Auth::user()->id_tingkat);
        // })->groupBy('id_mapel')->get();
        // $unfinished = Tugas::whereDoesntHave('jawaban', function (Builder $query) {
        //     $query->where('id_siswa', '=', Auth::user()->id)
        //         ->where('id_tingkat', '=', Auth::user()->id_tingkat);
        // })->groupBy('id_mapel')->get();
        // $selesai = Tugas::whereHas('tingkat', function (Builder $query) {
        //     $query->where('id_tingkat', '=', Auth::user()->id_tingkat)
        //         ->whereHas('jawaban', function (Builder $query) {
        //             $query->where('id_siswa', '=', Auth::user()->id);
        //         });
        // })->get();
        // $finished =  Tingkat::whereHas('tugas', function (Builder $query) {
        //     $query->where('id_tingkat', '=', Auth::user()->id_tingkat)
        //         ->whereHas('mapel')
        //         ->whereHas('jawaban', function (Builder $query) {
        //             $query->where('id_siswa', '=', Auth::user()->id);
        //         });
        // })->get();

        // $unfinished =  Tugas::whereHas('mapel', function (Builder $query) {
        //     $query->where('id_tingkat', '=', Auth::user()->id_tingkat)
        //         ->whereDoesntHave('jawaban', function (Builder $query) {
        //             $query->where('id_siswa', '=', Auth::user()->id);
        //         });
        // })->groupBy('id_mapel')->get();
        $all =  Tugas::whereHas('mapel', function (Builder $query) {
            $query->where('id_tingkat', '=', Auth::user()->id_tingkat);
        })->groupBy('id_mapel')->get();

        $finished =  Tugas::whereHas('mapel')
            ->whereHas('jawaban', function (Builder $query) {
                $query->where('id_siswa', '=', Auth::user()->id);
            })
            ->whereHas('tingkat', function (Builder $query) {
                $query->where('id_tingkat', '=', Auth::user()->id_tingkat);
            })->groupBy('id_mapel')->get();

        $unfinished =  Tugas::whereHas('mapel')
            ->whereDoesntHave('jawaban', function (Builder $query) {
                $query->where('id_siswa', '=', Auth::user()->id);
            })
            ->whereHas('tingkat', function (Builder $query) {
                $query->where('id_tingkat', '=', Auth::user()->id_tingkat);
            })->groupBy('id_mapel')->get();

        // dd($finished->toArray(), $unfinished->toArray());
        $id_tugas_finished = [];
        foreach ($finished as $value) {
            // echo '<pre>';
            $id_tugas_finished[] = $value->id;
            // echo '</pre>';
        }
        $id_tugas_unfinished = [];
        foreach ($unfinished as $value) {
            // echo '<pre>';
            $id_tugas_unfinished[] = $value->id;
            // echo '</pre>';
        }
        // dd(json_encode($data));
        // dd($finished->toArray());

        return view('siswa.tugas', compact(['all', 'finished', 'unfinished', 'id_tugas_finished', 'id_tugas_unfinished']));
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
