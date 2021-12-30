@extends('layouts.template')
@section('title', 'Form Tambah Mapel')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>EDIT MATA PELAJARAN</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <a href="{{ route('mapel.index') }}" class="btn btn-warning">Kembali</a>
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group form-float">
                                    <div class="form-line @error('nama_mapel') error focused @enderror">
                                        <input type="text" name="nama_mapel" class="form-control"
                                            value="{{ $mapel->nama_mapel }}">
                                        <label class="form-label">Mata Pelajaran</label>
                                    </div>
                                    @error('nama_mapel')
                                    <label id="name-error" class="error" for="nama_mapel">{{ $message }}
                                        @enderror
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection