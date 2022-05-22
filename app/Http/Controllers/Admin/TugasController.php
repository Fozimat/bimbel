<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mapel;
use App\Models\Tugas;
use App\Models\Tingkat;
use App\Http\Requests\TugasRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugas = Tugas::with('mapel', 'tingkat')->orderBy('created_at', 'DESC')->get();
        return view('tugas.index', compact(['tugas']));
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
        return view('tugas.create', compact(['mapel', 'tingkat']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TugasRequest $request)
    {
        $tugas = $request->file('tugas');
        $nama_tugas = time() . '-' . $request->judul . '.' . $tugas->getClientOriginalExtension();
        $tugas->move(public_path('tugas'), $nama_tugas);
        $data = [
            'id_mapel' => $request->id_mapel,
            'id_tingkat' => $request->id_tingkat,
            'judul' => $request->judul,
            'tugas' => $nama_tugas,
            'batas_pengantaran' => $request->batas_pengantaran,
            'keterangan' => $request->keterangan
        ];
        Tugas::create($data);
        return redirect()->route('tugas.index')->with('flash', 'Tugas Berhasil Ditambahkan');
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
        $tugas = Tugas::findOrFail($id);

        return view('tugas.edit', compact(['mapel', 'tingkat', 'tugas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TugasRequest $request, Tugas $tugas)
    {
        $data = [
            'id_mapel' => $request->id_mapel,
            'id_tingkat' => $request->id_tingkat,
            'judul' => $request->judul,
            'batas_pengantaran' => $request->batas_pengantaran,
            'keterangan' => $request->keterangan
        ];
        if ($request->hasFile('tugas')) {
            $path = public_path('tugas/' . $tugas->tugas);
            if (File::exists($path)) {
                unlink($path);
            }
            $tugas_baru = $request->file('tugas');
            $nama_tugas = time() . '-' . $request->judul . '.' . $tugas_baru->getClientOriginalExtension();
            $tugas_baru->move(public_path('tugas'), $nama_tugas);
            $data['tugas'] = $nama_tugas;
        } else {
            $data['tugas'] = $request->tugas_lama;
        }
        $tugas->update($data);
        return redirect()->route('tugas.index')->with('flash', 'Tugas Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tugas)
    {
        $path = public_path('tugas/' . $tugas->tugas);
        if (File::exists($path)) {
            unlink($path);
        }
        $tugas->delete();
        return redirect()->route('tugas.index')->with('flash', 'Tugas Berhasil Dihapus');
    }
}
