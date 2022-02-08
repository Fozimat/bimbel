@extends('layouts.template')
@section('title', 'Edit Tugas')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Edit Tugas</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ $tugas->judul }}
                    </h2>
                </div>
                <div class="body">
                    <form action="{{ route('tugassiswa.update', $jawaban->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="nama">Batas Pengantaran</label>
                        <div class="form-group">
                            <div class="form-line disabled">
                                <input type="text" disabled id="nama" name="nama" class="form-control"
                                    value="{{  $tugas->batas_pengantaran->isoFormat('dddd, D MMMM Y - HH:mm') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <div class="form-line disabled">
                                <textarea rows="4" class="form-control no-resize" disabled name="keterangan">{{
                                    $tugas->keterangan }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line @error('jawaban') error focused @enderror">
                                <label for="jawaban">JAWABAN (Isi Jawaban anda pada kotak di bawah ini)</label>
                                <textarea id="ckeditor" name="jawaban">{{ $jawaban->jawaban }}</textarea>
                            </div>
                            @error('jawaban')
                            <label id="jawaban-error" class="error" for="jawaban">{{ $message }}
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
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