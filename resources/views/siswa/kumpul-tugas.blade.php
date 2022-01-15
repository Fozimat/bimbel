@extends('layouts.template')
@section('title', 'Antar Tugas')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Kumpulkan Tugas</h2>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ $tugassiswa->judul }}
                    </h2>
                </div>
                <div class="body">

                    <textarea id="ckeditor">

                    </textarea>
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