@extends('layouts.template')
@section('title', 'Daftar Tugas')
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
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Daftar Tugas
                    </h2>

                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="active"><a href="#all" data-toggle="tab">ALL</a></li>
                        <li role="presentation"><a href="#finished" data-toggle="tab">FINISHED</a>
                        </li>
                        <li role="presentation"><a href="#unfinished" data-toggle="tab">UNFINISHED</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="all">
                            @foreach ($all as $mapel)
                            <div class="block-header">
                                <h2>{{ $mapel->mapel->nama_mapel }}</h2>
                            </div>
                            @foreach ($mapel->mapel->tugas->where('id_tingkat', Auth::user()->id_tingkat) as $m)
                            <div class="card">
                                <div class="header bg-red">
                                    <h2>
                                        {{ $m->judul }} <small>{{ $m->created_at->isoFormat('dddd, D MMMM Y, HH:mm')
                                            }}</small>
                                    </h2>
                                </div>
                                <div class="body">
                                    <a href="{{ asset('tugas/'.$m->tugas) }}"
                                        class="btn bg-pink waves-effect m-r-10">Download
                                        Tugas</a>
                                    <a href="{{ route('tugassiswa.edit', $m->id) }}"
                                        class="btn bg-teal waves-effect">Kumpulkan Tugas</a>
                                    <span class="pull-right m-t-5 font-bold">Batas Pengumpulan: {{
                                        $m->batas_pengantaran->isoFormat('dddd, D MMMM Y,
                                        HH:mm')
                                        }}</span>
                                </div>
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="finished">
                            @foreach ($mapel_finished as $mapel)
                            <div class="block-header">
                                <h2>{{ $mapel->nama_mapel }}</h2>
                            </div>
                            @foreach ($mapel->tugas->where('id_tingkat', Auth::user()->id_tingkat) as $t)
                            @if (in_array($t->id, $id_tugas_finished))
                            <div class="card">
                                <div class="header bg-red">
                                    <h2>
                                        {{ $t->judul }} <small>{{ $t->created_at->isoFormat('dddd, D MMMM Y, HH:mm')
                                            }}</small>
                                    </h2>
                                </div>
                                <div class="body">
                                    <a href="{{ asset('tugas/'.$t->tugas) }}"
                                        class="btn bg-pink waves-effect m-r-10">Download
                                        Tugas</a>
                                    <a href="{{ route('tugassiswa.edit', $t->id) }}"
                                        class="btn bg-teal waves-effect">Kumpulkan Tugas</a>
                                    <span class="pull-right m-t-5 font-bold">Batas Pengumpulan: {{
                                        $t->batas_pengantaran->isoFormat('dddd, D MMMM Y,
                                        HH:mm')
                                        }}</span>
                                </div>
                            </div>
                            @endif

                            @endforeach
                            @endforeach
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="unfinished">
                            @foreach ($mapel_unfinished as $mapel)
                            <div class="block-header">
                                <h2>{{ $mapel->nama_mapel }}</h2>
                            </div>
                            @foreach ($mapel->tugas->where('id_tingkat', Auth::user()->id_tingkat) as $t)
                            @if (in_array($t->id, $id_tugas_unfinished))
                            <div class="card">
                                <div class="header bg-red">
                                    <h2>
                                        {{ $t->judul }} <small>{{ $t->created_at->isoFormat('dddd, D MMMM Y,
                                            HH:mm')
                                            }}</small>
                                    </h2>
                                </div>
                                <div class="body">
                                    <a href="{{ asset('tugas/'.$t->tugas) }}"
                                        class="btn bg-pink waves-effect m-r-10">Download
                                        Tugas</a>
                                    <a href="{{ route('tugassiswa.edit', $t->id) }}"
                                        class="btn bg-teal waves-effect">Kumpulkan Tugas</a>
                                    <span class="pull-right m-t-5 font-bold">Batas Pengumpulan: {{
                                        $t->batas_pengantaran->isoFormat('dddd, D MMMM Y,
                                        HH:mm')
                                        }}</span>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
@endsection