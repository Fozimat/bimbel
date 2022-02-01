@extends('layouts.template')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL MATERI</div>
                    <div class="number count-to" data-from="0" data-to="{{ $total_materi }}" data-speed="1000"
                        data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">help</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL TUGAS</div>
                    <div class="number count-to" data-from="0" data-to="{{ $total_tugas }}" data-speed="1000"
                        data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">forum</i>
                </div>
                <div class="content">
                    <div class="text">TUGAS DIKERJAKAN</div>
                    <div class="number count-to" data-from="0" data-to="{{ $total_tugas_finished }}" data-speed="1000"
                        data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text" style="font-size: 10px;">TUGAS BELUM DIKERJAKAN</div>
                    <div class="number count-to" data-from="0" data-to="{{ $total_tugas_unfinished }}" data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header bg-blue-grey">
                    <h2>
                        DAFTAR TUGAS YANG BELUM DIKERJAKAN
                    </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tugas</th>
                                    <th>Mapel</th>
                                    <th>Batas Pengantaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftar_tugas_unfinished as $tugas)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tugas->judul }}</td>
                                    <td>{{ $tugas->mapel->nama_mapel }}</td>
                                    <td>{{ $tugas->created_at->isoFormat('dddd, D MMMM Y, HH:mm') }}</td>
                                    <td>
                                        <a href="{{ route('tugassiswa.edit', $tugas->id) }}"
                                            class="btn bg-teal waves-effect">Kumpulkan Sekarang</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection