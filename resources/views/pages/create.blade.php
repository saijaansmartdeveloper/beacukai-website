@extends('layouts.admin')

@section('title', 'Tambah Halaman')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form method="POST" action="{{ route('pages.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_page" class="form-label">Nama Halaman <span class="form-required">*</span></label>
                        <input id="name_page" type="text" class="form-control{{ $errors->has('name_page') ? ' is-invalid' : '' }}" name="name_page" value="{{ old('name_page') }}" required>
                        {!! $errors->first('name_page', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description_page" class="form-label">Deskripsi Halaman</label>
                        <textarea id="description_page" class="form-control{{ $errors->has('description_page') ? ' is-invalid' : '' }}" name="description_page" rows="2">{{ old('description_page') }}</textarea>
                        {!! $errors->first('description_page', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="content_page" class="form-label">Isi Halaman</label>
                        <textarea id="summernote" class="form-control{{ $errors->has('content_page') ? ' is-invalid' : '' }}" name="content_page" rows="10">{{ old('content_page') }}</textarea>
                        {!! $errors->first('content_page', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="file" name="image_page" />
                        {!! $errors->first('image_page', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Tambah Halaman" class="btn btn-success">
                        <a href="{{ route('pages.index') }}" class="btn btn-link">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        });
    </script>
@endsection
