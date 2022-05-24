@extends('layouts.template')
@section('title', 'Daftar Tugas Siswa')
@push('style')
<!-- JQuery DataTable Css -->
<link href="{{ asset('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
    rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2> {{ $tugas[0]->judul }}
        </h2>
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
                <div class="header">
                    <h2 class="font-bold col-pink">
                        Batas Pengantaran: {{ date('d/m/Y - H:i', strtotime($batas_pengantaran[0])) }}
                    </h2>
                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#finished" data-toggle="tab">
                                <i class="material-icons">assignment_turned_in</i> FINISHED
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#unfinished" data-toggle="tab">
                                <i class="material-icons">assignment_late</i> UNFINISHED
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="finished">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Waktu Pengantaran</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($finished as $key => $f)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $f->nama }}</td>
                                            <td>{{ date('d/m/Y - H:i', strtotime($res[$key]['created_at'])) }}</td>
                                            <td>{!! strtotime($res[$key]['created_at']) >=
                                                strtotime($batas_pengantaran[0]) ? '<a
                                                    class="btn bg-red waves-effect">telat</a>' :
                                                '<a class="btn btn-success waves-effect"">oke</a>' !!} </td>
                                                <td><a href=" {{ route('detail-jawaban-siswa', ['siswa'=> $f->id, 'tgs'
                                                    => $tugas[0]->id]) }}"
                                                    class=" btn bg-cyan waves-effect">Lihat Jawaban</a>
                                                <form style="display: inline" method="POST"
                                                    action="{{ route('hapus.jawaban.tingkat', ['tingkat' => $id_tingkat->tingkat->id, 'tgs' => $tugas[0]->id, 'jawaban' => $finished[0]->jawaban[$key]->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Apakah anda yakin?')" type="submit"
                                                        class="btn btn-danger">Hapus Jawaban</button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="unfinished">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($unfinished as $un)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $un->nama }}</td>
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
    </div>

</div>
@endsection

@push('script')
<script src="{{ asset('assets/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@endpush