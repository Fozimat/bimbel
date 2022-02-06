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
                    <h2>
                        <a href="{{ route('tugas.create') }}" class="btn btn-success">Tambah Tugas</a>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable tugas-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mapel</th>
                                    <th>Tingkat</th>
                                    <th>Judul</th>
                                    <th>Tugas</th>
                                    <th>Batas Pengantaran</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
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
                                    <td>{{ $t->tingkat->tingkat }}</td>
                                    <td>{{ $t->judul }}</td>
                                    <td><a class="btn bg-deep-purple waves-effect"
                                            href="{{ asset('tugas/'.$t->tugas) }}">download</a></td>
                                    <td>{{ $t->batas_pengantaran }}</td>
                                    <td>{{ $t->keterangan }}</td>
                                    <td style="width: 150px;"><a href="{{ route('tugas.edit', $t->id) }}"
                                            class="btn btn-primary">edit</a> |
                                        <form style="display: inline-block;"
                                            action="{{ route('tugas.destroy', $t->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda yakin?')">delete</button>
                                        </form>
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
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@endpush