<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mapel;
use App\Models\Materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MateriRequest;
use App\Models\Tingkat;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::with('mapel', 'tingkat')->get();
        return view('materi.index', compact(['materi']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all();
        $tingkat = Tingkat::all();
        return view('materi.create', compact(['mapel', 'tingkat']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriRequest $request)
    {
        $materi = $request->file('materi');
        $nama_materi = time() . '-' . $request->judul . '.' . $materi->getClientOriginalExtension();
        $materi->move(public_path('materi'), $nama_materi);
        $data = [
            'id_mapel' => $request->id_mapel,
            'id_tingkat' => $request->id_tingkat,
            'judul' => $request->judul,
            'materi' => $nama_materi,
            'keterangan' => $request->keterangan
        ];
        Materi::create($data);
        return redirect()->route('materi.index')->with('flash', 'Materi Berhasil Ditambahkan');
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
        $mapel = Mapel::all();
        $tingkat = Tingkat::all();
        $materi = Materi::findOrFail($id);

        return view('materi.edit', compact(['mapel', 'tingkat', 'materi']));
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
