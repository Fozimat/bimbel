<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Tingkat;
use App\Http\Controllers\Controller;
use App\Http\Requests\MateriRequest;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;

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

    public function materiPDF()
    {
        $materi = Materi::with('mapel', 'tingkat')->get();
        $pdf = PDF::loadview('materi.laporan', compact(['materi']))->setPaper('a4', 'portrait');
        return $pdf->stream();
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
    public function update(MateriRequest $request, Materi $materi)
    {
        $data = [
            'id_mapel' => $request->id_mapel,
            'id_tingkat' => $request->id_tingkat,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan
        ];
        if ($request->hasFile('materi')) {
            $path = public_path('materi/' . $materi->materi);
            if (File::exists($path)) {
                unlink($path);
            }
            $materi_baru = $request->file('materi');
            $nama_materi = time() . '-' . $request->judul . '.' . $materi_baru->getClientOriginalExtension();
            $materi_baru->move(public_path('materi'), $nama_materi);
            $data['materi'] = $nama_materi;
        } else {
            $data['materi'] = $request->materi_lama;
        }
        $materi->update($data);
        return redirect()->route('materi.index')->with('flash', 'Materi Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        $path = public_path('materi/' . $materi->materi);
        if (File::exists($path)) {
            unlink($path);
        }
        $materi->delete();
        return redirect()->route('materi.index')->with('flash', 'Materi Berhasil Dihapus');
    }
}
