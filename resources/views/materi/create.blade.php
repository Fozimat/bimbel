@extends('layouts.template')
@section('title', 'Form Tambah Materi')
@push('style')
<link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>TAMBAH MATERI</h2>
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
                            <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group form-float">
                                    <div class="form-line @error('id_mapel') error focused @enderror">
                                        <select class="form-control show-tick" name="id_mapel" name="id_mapel">
                                            <option value="">-- Pilih Mapel --</option>
                                            @foreach ($mapel as $m)
                                            <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_mapel')
                                    <label id="name-error" class="error" for="id_mapel">{{ $message }}
                                        @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line @error('id_tingkat') error focused @enderror">
                                        <select class="form-control show-tick" name="id_tingkat">
                                            <option value="">-- Pilih Tingkat --</option>
                                            @foreach ($tingkat as $t)
                                            <option value="{{ $t->id }}">{{ $t->tingkat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_tingkat')
                                    <label id="name-error" class="error" for="id_tingkat">{{ $message }}
                                        @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line @error('judul') error focused @enderror">
                                        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
                                        <label class="form-label">Judul</label>
                                    </div>
                                    @error('judul')
                                    <label id="name-error" class="error" for="judul">{{ $message }}
                                        @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line @error('materi') error focused @enderror">
                                        <input type="file" name="materi" class="form-control">
                                    </div>
                                    @error('materi')
                                    <label id="name-error" class="error" for="materi">{{ $message }}
                                        @enderror
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line @error('keterangan') error focused @enderror">
                                        <textarea rows="4" class="form-control no-resize" name="keterangan">{{
                                            old('keterangan') }}</textarea>
                                        <label class="form-label">Keterangan</label>
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