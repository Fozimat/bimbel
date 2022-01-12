<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Mapel;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class MateriSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_mapel = Mapel::select('nama_mapel', DB::raw('count(*) as jumlah'))
            ->join('materi', 'mapel.id', '=', 'materi.id_mapel')
            ->where('id_tingkat', '=', Auth::user()->id_tingkat)
            ->groupBy('id_mapel')
            ->orderBy('id_mapel')
            ->get();
        // $materi_per_mapel = Mapel::select('materi.id', 'nama_mapel', 'judul', 'materi', 'keterangan', 'materi.created_at')
        //     ->join('materi', 'mapel.id', '=', 'materi.id_mapel')
        //     ->where('id_tingkat', '=', Auth::user()->id_tingkat)
        //     ->orderBy('id_mapel')
        //     ->get();
        // dd($materi_per_mapel);
        $daftar_mapel = Mapel::whereHas('materi', function (Builder $query) {
            $query->where('id_tingkat', '=', Auth::user()->id_tingkat)
                ->orderBy('id_mapel');
        })->get();
        // dd($daftar_mapel);
        return view('siswa.materi', compact(['daftar_mapel', 'total_mapel']));
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
    public function destroy($id)
    {
        //
    }
}
