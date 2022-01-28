<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Tugas;
use App\Models\Tingkat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

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

    public function tugas($id, $tgs)
    {
        $finished = User::whereHas('jawaban', function (Builder $query) use ($tgs) {
            $query->where('id_tugas', '=', $tgs);
        })->whereHas('tingkat', function (Builder $query) use ($id) {
            $query->where('id_tingkat', '=', $id);
        })->get();

        $tugas =  Tugas::where('id_tingkat', '=', $id)->where('id', '=', $tgs)->pluck('judul');
        $unfinished = User::whereDoesntHave('jawaban', function (Builder $query) use ($tgs) {
            $query->where('id_tugas', '=', $tgs);
        })->whereHas('tingkat', function (Builder $query) use ($id) {
            $query->where('id_tingkat', '=', $id);
        })->get();

        return view('jawaban.tugas', compact(['finished', 'unfinished', 'tugas']));
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
