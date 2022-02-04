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
                        {{ $jawaban }}
                    </h2>
                </div>
                <div class="body">
                    <form action="" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="id_tugas" value="{{ $tugassiswa->id }}"> --}}
                        <div class="form-group">
                            <div class="form-line @error('jawaban') error focused @enderror">
                                <label for="jawaban">Jawaban</label>
                                <textarea id="ckeditor" name="jawaban"></textarea>
                            </div>
                            @error('jawaban')
                            <label id="jawaban-error" class="error" for="jawaban">{{ $message }}
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Kumpul</button>
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