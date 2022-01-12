@extends('layouts.template')
@section('title', 'Daftar Materi')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DAFTAR MATERI</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        @foreach ($total_mapel as $mapel)
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">{{ $mapel->nama_mapel }}</div>
                    <div class="number count-to" data-from="0" data-to="{{ $mapel->jumlah }}" data-speed="15"
                        data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- #END# Widgets -->

    @foreach ($daftar_mapel as $mapel)
    <div class="block-header">
        <h2>{{ $mapel->nama_mapel }}</h2>
    </div>
    <div class="row clearfix">
        @foreach ($mapel->materi->where('id_tingkat', Auth::user()->id_tingkat) as $m)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="header bg-red">
                    <h2>
                        {{ $m->judul }} <small>{{ $m->created_at->isoFormat('dddd, D MMMM Y, HH:mm') }}</small>
                    </h2>

                </div>
                <div class="body align-center">
                    <a href="{{ asset('materi/'.$m->materi) }}" class="btn bg-indigo waves-effect">Download Materi</a>
                </div>
                <div class="m-l-10" style="padding-bottom: 5px">
                    <p><strong>Keterangan:</strong> {{ $m->keterangan }}</p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    @endforeach


</div>
@endsection