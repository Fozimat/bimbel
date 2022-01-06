@extends('layouts.template')
@section('title', 'Form Edit Tingkat')
@push('style')
<link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>EDIT TINGKAT</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <a href="{{ route('materi.index') }}" class="btn btn-warning">Kembali</a>
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <form action="{{ route('materi.update', $materi->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="form-line @error('id_mapel') error focused @enderror">
                                        <label for="id_mapel">Mata Pelajaran</label>
                                        <select class="form-control show-tick" name="id_mapel" name="id_mapel">
                                            <option value="">-- Pilih Mapel --</option>
                                            @foreach ($mapel as $m)
                                            <option value="{{ $m->id }}" {{ $m->id == $materi->mapel->id ?
                                                'selected' :
                                                '' }}>{{ $m->nama_mapel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_mapel')
                                    <label id="name-error" class="error" for="id_mapel">{{ $message }}
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-line @error('id_tingkat') error focused @enderror">
                                        <label for="id_tingkat">Tingkat</label>
                                        <select class="form-control show-tick" name="id_tingkat">
                                            <option value="">-- Pilih Tingkat --</option>
                                            @foreach ($tingkat as $t)
                                            <option value="{{ $t->id }}" {{ $t->id == $materi->tingkat->id ? 'selected'
                                                : '' }}>{{ $t->tingkat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_tingkat')
                                    <label id="name-error" class="error" for="id_tingkat">{{ $message }}
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <div class="form-line @error('judul') error focused @enderror">
                                        <input type="text" name="judul" class="form-control"
                                            value="{{ $materi->judul }}">
                                    </div>
                                    @error('judul')
                                    <label id="name-error" class="error" for="judul">{{ $message }}
                                        @enderror
                                </div>
                                <input type="hidden" name="materi_lama" class="form-control"
                                    value="{{ $materi->materi }}">
                                <div class="form-group">
                                    <label for="materi">Materi</label>
                                    <div class="form-line @error('materi') error focused @enderror">
                                        <input type="file" name="materi" class="form-control">
                                    </div>
                                    @error('materi')
                                    <label id="name-error" class="error" for="materi">{{ $message }}
                                        @enderror
                                        <p class="font-bold col-pink">*Kosongkan file jika tidak ingin diganti
                                        </p>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <div class="form-line @error('keterangan') error focused @enderror">
                                        <textarea rows="4" class="form-control no-resize" name="keterangan">{{
                                            $materi->keterangan }}</textarea>
                                    </div>
                                    @error('keterangan')
                                    <label id="name-error" class="error" for="keterangan">{{ $message }}
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
@push('script')
<script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
@endpush