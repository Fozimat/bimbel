<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Tugas;
use App\Models\Jawaban;
use App\Models\Tingkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $unfinished = User::whereDoesntHave('jawaban', function (Builder $query) use ($tgs) {
            $query->where('id_tugas', '=', $tgs);
        })->whereHas('tingkat', function (Builder $query) use ($id) {
            $query->where('id_tingkat', '=', $id);
        })->get();
        // $finished = Jawaban::whereHas('user', function (Builder $query) use ($tgs) {
        //     $query->where('id_tugas', '=', $tgs);
        // })->get();
        // $unfinished = Jawaban::whereHas('user', function (Builder $query) use ($tgs) {
        //     $query->where('id_tugas', '=', $tgs);
        // })->get();
        // $unfinished =  Tugas::whereDoesntHave('jawaban', function (Builder $query) {
        //     $query->where('id_siswa', '=', Auth::user()->id);
        // })
        //     ->whereHas('tingkat', function (Builder $query) {
        //         $query->where('id_tingkat', '=', Auth::user()->id_tingkat);
        //     })->get();
        // $db = DB::select('select * from `users` where exists (select * from `jawaban` where `users`.`id` = `jawaban`.`id_siswa`) and exists (select * from `jawaban` inner join `tugas` on `jawaban`.`id_tugas` = `tugas`.`id` where `users`.`id` = `jawaban`.`id_siswa` and `id_tugas` = 4)');
        // dd($finished->toArray(), $unfinished->toArray());
        return view('jawaban.tugas', compact(['finished', 'unfinished']));
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
