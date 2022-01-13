@extends('layouts.template')
@section('title', 'Daftar Tugas')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>TUGAS</h2>
    </div>

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
                        <li role="presentation" class="active"><a href="#home" data-toggle="tab">ALL</a></li>
                        <li role="presentation"><a href="#profile" data-toggle="tab">FINISHED</a>
                        </li>
                        <li role="presentation"><a href="#messages" data-toggle="tab">UNFINISHED</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                            @foreach ($daftar_tugas as $mapel)
                            <div class="block-header">
                                <h2>{{ $mapel->nama_mapel }}</h2>
                            </div>
                            @foreach ($mapel->tugas->where('id_tingkat', Auth::user()->id_tingkat) as $m)
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
                                    <a href="#" class="btn bg-teal waves-effect">Kumpulkan Tugas</a>
                                    <span class="pull-right m-t-5 font-bold">Batas Pengumpulan: {{
                                        $m->batas_pengantaran->isoFormat('dddd, D MMMM Y,
                                        HH:mm')
                                        }}</span>
                                </div>
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <b>Profile Content</b>
                            <p>
                                Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an.
                                Pri ut tation electram moderatius.
                                Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                sadipscing mel.
                            </p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="messages">
                            <b>Message Content</b>
                            <p>
                                Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an.
                                Pri ut tation electram moderatius.
                                Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                sadipscing mel.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
@endsection