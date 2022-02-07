@extends('layouts.template')
@section('title', 'Ganti Profile')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>GANTI PROFILE</h2>
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
                    <form action="{{ route('ganti-profile-post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="nama">Nama</label>
                        <div class="form-group">
                            <div class="form-line @error('nama') error focused @enderror">
                                <input type="text" id="nama" name="nama" class="form-control"
                                    value="{{ auth()->user()->nama }}" required>
                            </div>
                            @error('nama')
                            <label id="username-error" class="error" for="nama">{{ $message }}
                                @enderror
                        </div>
                        <label for="email">Email</label>
                        <div class="form-group">
                            <div class="form-line disabled">
                                <input type="text" disabled id="email" name="email" class="form-control"
                                    value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                        <label for="email">Avatar</label>
                        <input type="hidden" name="avatar_default" value="{{ auth()->user()->avatar }}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2">
                                    <img class="img-responsive thumbnail"
                                        src="{{ asset('avatar/'. auth()->user()->avatar ) }}" width="100" height="100"
                                        alt="Avatar">
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-line @error('avatar') error focused @enderror">
                                        <input type="file" id="avatar" name="avatar" class="form-control">
                                    </div>
                                    @error('avatar')
                                    <label id="avatar-error" class="error" for="avatar">{{ $message }}
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection