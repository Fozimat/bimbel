@extends('layouts.template')
@section('title', 'Form Tambah Tingkat')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>TAMBAH TINGKAT</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <a href="{{ route('tingkat.index') }}" class="btn btn-warning">Kembali</a>
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <form action="{{ route('tingkat.store') }}" method="POST">
                                @csrf
                                <div class="form-group form-float">
                                    <div class="form-line @error('tingkat') error focused @enderror">
                                        <input type="text" name="tingkat" class="form-control">
                                        <label class="form-label">Tingkat</label>
                                    </div>
                                    @error('tingkat')
                                    <label id="name-error" class="error" for="tingkat">{{ $message }}
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