<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TingkatRequest;
use App\Models\Tingkat;
use Illuminate\Http\Request;

class TingkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tingkat = Tingkat::all();
        return view('tingkat.index', compact(['tingkat']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tingkat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TingkatRequest $request)
    {
        Tingkat::create($request->all());
        return redirect()->route('tingkat.index')->with('flash', 'Tingkat Berhasil Ditambahkan');
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
    public function edit(Tingkat $tingkat)
    {
        return view('tingkat.edit', compact(['tingkat']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TingkatRequest $request, Tingkat $tingkat)
    {
        $tingkat->update($request->all());
        return redirect()->route('tingkat.index')->with('flash', 'Tingkat Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tingkat $tingkat)
    {
        $tingkat->delete();
        return redirect()->route('tingkat.index')->with('flash', 'Tingkat Berhasil Dihapus');
    }
}
