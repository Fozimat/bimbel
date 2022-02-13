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
                    <i class="material-icons">group</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL SISWA</div>
                    <div class="number count-to" data-from="0" data-to="{{ $total_siswa }}" data-speed="1000"
                        data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">school</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL TINGKAT</div>
                    <div class="number count-to" data-from="0" data-to="{{ $total_tingkat }}" data-speed="1000"
                        data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">library_books</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL MAPEL</div>
                    <div class="number count-to" data-from="0" data-to="{{ $total_mapel }}" data-speed="1000"
                        data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL ADMIN</div>
                    <div class="number count-to" data-from="0" data-to="{{ $total_admin }}" data-speed="1000"
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
                        STATUS SISWA
                    </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Last Seen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(Cache::has('user-is-online-' . $user->id))
                                        <span class="badge bg-green">Online</span>
                                        @else
                                        <span class="badge bg-grey">Offline</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
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