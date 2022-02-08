@extends('layouts.template')
@section('title', 'Form Edit Siswa')
@push('style')
<link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>EDIT SISWA</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <a href="{{ route('siswa.index') }}" class="btn btn-warning">Kembali</a>
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <div class="form-line @error('nama') error focused @enderror">
                                        <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}">
                                    </div>
                                    @error('nama')
                                    <label id="name-error" class="error" for="nama">{{ $message }}
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <div class="form-line @error('email') error focused @enderror">
                                        <input type="text" name="email" class="form-control"
                                            value="{{ $siswa->email }}">
                                    </div>
                                    @error('email')
                                    <label id="name-error" class="error" for="email">{{ $message }}
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-line @error('id_tingkat') error focused @enderror">
                                        <label for="id_tingkat">Tingkat</label>
                                        <select class="form-control show-tick" name="id_tingkat">
                                            <option value="">-- Pilih Tingkat --</option>
                                            @foreach ($tingkat as $t)
                                            <option value="{{ $t->id }}" {{ $t->id == $siswa->tingkat->id ? 'selected'
                                                : '' }}>{{ $t->tingkat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_tingkat')
                                    <label id="name-error" class="error" for="id_tingkat">{{ $message }}
                                        @enderror
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>@push('script')
        <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
        @endpush
    </div>


</div>
@endsection