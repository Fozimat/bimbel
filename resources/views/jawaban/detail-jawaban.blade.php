@extends('layouts.template')
@section('title', 'Detail Jawaban Siswa')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Detail Jawaban</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <a href="{{ url()->previous() }}" class="btn btn-warning">Kembali</a>
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            {{-- <h3>Jawaban</h3>
                            <p class="m-t-15 m-b-20">
                                {!! $jawaban[0]->jawaban !!}
                            </p> --}}
                            <div class="form-group">
                                <div class="form-line disabled">
                                    <label for="jawaban">JAWABAN</label>
                                    <textarea id="ckeditor" disabled="disabled" name="jawaban">{!! $jawaban[0]->jawaban
                                        !!}</textarea>
                                </div>

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
<!-- Ckeditor -->
<script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/editors.js') }}"></script>

@endpush