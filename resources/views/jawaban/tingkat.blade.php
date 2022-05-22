@extends('layouts.template')
@section('title', 'Tugas')
@push('style')
<!-- JQuery DataTable Css -->
<link href="{{ asset('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
    rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>TUGAS</h2>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <a href="{{ route('jawaban.index') }}" class="btn btn-success">Kembali</a>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mapel</th>
                                    <th>Judul</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($tugas as $t)
                                <tr>
                                    <td style="width: 10px;">{{ $no++ }}</td>
                                    <td>{{ $t->mapel->nama_mapel }}</td>
                                    <td>{{ $t->judul }}</td>
                                    <td style="width: 150px;"><a
                                            href="{{ route('jawaban-siswa', ['id' => $t->id_tingkat, 'tgs' => $t->id]) }}"
                                            class="btn btn-primary">detail</a>
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

@push('script')
<script src="{{ asset('assets/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@endpush