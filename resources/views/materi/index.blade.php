@extends('layouts.template')
@section('title', 'Materi')
@push('style')
<!-- JQuery DataTable Css -->
<link href="{{ asset('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
    rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>TINGKAT</h2>
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
                        <a href="{{ route('materi.create') }}" class="btn btn-success">Tambah Materi</a>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable materi-nowrap">
                            <a target="_blank" href="{{ route('materi.pdf') }}"
                                class="btn bg-purple waves-effect">PDF</a>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mapel</th>
                                    <th>Tingkat</th>
                                    <th>Judul</th>
                                    <th>Materi</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($materi as $m)
                                <tr>
                                    <td style="width: 10px;">{{ $no++ }}</td>
                                    <td>{{ $m->mapel->nama_mapel }}</td>
                                    <td>{{ $m->tingkat->tingkat }}</td>
                                    <td>{{ $m->judul }}</td>
                                    <td><a class="btn bg-deep-purple waves-effect"
                                            href="{{ asset('materi/'.$m->materi) }}">download</a></td>
                                    <td>{{ $m->keterangan }}</td>
                                    <td style="width: 150px;"><a href="{{ route('materi.edit', $m->id) }}"
                                            class="btn btn-primary">edit</a> |
                                        <form style="display: inline-block;"
                                            action="{{ route('materi.destroy', $m->id) }}" method="POST">
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
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@endpush