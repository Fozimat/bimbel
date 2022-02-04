<?php

namespace App\Http\Controllers\Siswa;

use App\Models\User;
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
        $mapel_finished =  Mapel::whereHas('tugas')->whereHas('jawaban', function (Builder $query) {
            $query->where('id_siswa', '=', Auth::user()->id);
        })->get();

        $mapel_unfinished = Mapel::whereHas('tugas')->whereDoesntHave('jawaban', function (Builder $query) {
            $query->where('id_siswa', '=', Auth::user()->id);
        })->get();

        $all =  Tugas::whereHas('mapel', function (Builder $query) {
            $query->where('id_tingkat', '=', Auth::user()->id_tingkat);
        })->groupBy('id_mapel')->get();

        $finished =  Tugas::whereHas('mapel')
            ->whereHas('jawaban', function (Builder $query) {
                $query->where('id_siswa', '=', Auth::user()->id);
            })
            ->whereHas('tingkat', function (Builder $query) {
                $query->where('id_tingkat', '=', Auth::user()->id_tingkat);
            })->get();

        $unfinished =  Tugas::whereHas('mapel')
            ->whereDoesntHave('jawaban', function (Builder $query) {
                $query->where('id_siswa', '=', Auth::user()->id);
            })
            ->whereHas('tingkat', function (Builder $query) {
                $query->where('id_tingkat', '=', Auth::user()->id_tingkat);
            })->get();

        $id_tugas_finished = [];
        foreach ($finished as $tugas) {
            $id_tugas_finished[] = $tugas->id;
        }

        $id_tugas_unfinished = [];
        foreach ($unfinished as $tugas) {
            $id_tugas_unfinished[] = $tugas->id;
        }

        $jawaban = Jawaban::where('id_siswa', '=', Auth::user()->id)->get();
        // dd($jawaban->toArray());

        // $jawaban = Jawaban::with(['tugas'])->get();
        $user = User::whereHas('jawaban', function (Builder $query) {
            $query->where('id_tugas', '=', 5)
                ->where('id_siswa', '=', Auth::user()->id);
        })->whereHas('tingkat', function (Builder $query) {
            $query->where('id_tingkat', '=', 1);
        })->get();
        // dd($user[0]->tingkat->tugas->where('id', '=', 5)->toArray());

        return view('siswa.tugas', compact(['all', 'finished', 'unfinished', 'id_tugas_finished', 'id_tugas_unfinished',  'mapel_finished', 'mapel_unfinished']));
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
        return view('siswa.kumpul-tugas', compact(['tugassiswa']));
    }

    public function ubah($jawaban, $tgs)
    {
        $tugas = Tugas::findOrFail($tgs);
        dd($tugas);
        $jawaban = Jawaban::with('tugas')->findOrFail($jawaban);
        // dd($jawaban);
        return view('siswa.ubah-tugas', compact(['jawaban']));
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
        Jawaban::findOrFail($id)->delete();
        return redirect()->route('tugassiswa.index')->with('flash', 'Tugas Berhasil Dihapus');
    }
}
