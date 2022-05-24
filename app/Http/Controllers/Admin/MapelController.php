<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MapelRequest;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mata_pelajaran = Mapel::all();
        return view('mapel.index', compact(['mata_pelajaran']));
    }

    public function mapelPDF()
    {
        $mata_pelajaran = Mapel::all();
        $pdf = PDF::loadview('mapel.laporan', compact(['mata_pelajaran']))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapelRequest $request)
    {
        Mapel::create($request->all());
        return redirect()->route('mapel.index')->with('flash', 'Mata Pelajaran Berhasil Ditambahkan');
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
    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact(['mapel']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MapelRequest $request, Mapel $mapel)
    {
        $mapel->update($request->all());
        return redirect()->route('mapel.index')->with('flash', 'Mata Pelajaran Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        $relasi = ['tugas', 'materi', 'jawaban'];
        foreach ($relasi as $rel) {
            if ($mapel->$rel()->count() > 0) {
                return redirect()->route('mapel.index')->with('flash', 'Mapel gagal dihapus. Mapel digunakan ditabel lain.');
            }
        }
        $mapel->delete();
        return redirect()->route('mapel.index')->with('flash', 'Mata Pelajaran Berhasil Dihapus');
    }
}
