@extends('layouts.template')
@section('title', 'Ganti Password')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>GANTI PASSWORD</h2>
    </div>
    @if (session('flash'))
    <div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        {{ session('flash') }}
    </div>
    @endif
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <form action="{{ route('ganti-password-post') }}" method="POST">
                        @csrf
                        <label for="password_lama">Password Lama</label>
                        <div class="form-group">
                            <div class="form-line @error('password_lama') error focused @enderror">
                                <input type="password" id="password_lama" name="password_lama" class="form-control"
                                    placeholder="Masukkan password lama . . .">
                            </div>
                            @error('password_lama')
                            <label id="username-error" class="error" for="password_lama">{{ $message }}
                                @enderror
                        </div>
                        <label for="password_baru">Password Baru</label>
                        <div class="form-group">
                            <div class="form-line @error('password_baru') error focused @enderror">
                                <input type="password" id="password_baru" name="password_baru" class="form-control"
                                    placeholder="Masukkan password baru . . .">
                            </div>
                            @error('password_baru')
                            <label id="username-error" class="error" for="password_baru">{{ $message }}
                                @enderror
                        </div>
                        <label for="konfirmasi_password">Konfirmasi Password Baru</label>
                        <div class="form-group">
                            <div class="form-line @error('konfirmasi_password') error focused @enderror">
                                <input type="password" id="konfirmasi_password" name="konfirmasi_password"
                                    class="form-control" placeholder="Masukkan konfirmasi password baru . . .">
                            </div>
                            @error('konfirmasi_password')
                            <label id="username-error" class="error" for="konfirmasi_password">{{ $message }}
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection