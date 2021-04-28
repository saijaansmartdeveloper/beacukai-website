@extends('layouts.admin')

@section('title', __('post.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form method="POST" action="{{ route('posts.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Judul Post <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('title_post') ? ' is-invalid' : '' }}" name="title_post" value="{{ old('title_post') }}" required>
                        {!! $errors->first('title_post', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Isi Post</label>
                        <textarea id="summernote" class="form-control{{ $errors->has('content_post') ? ' is-invalid' : '' }}" name="content_post" rows="8">{{ old('content_post') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="priority" class="form-label">Prioritas <span class="form-required">*</span></label>
                        <input id="priority" type="text" list="berita_terkini" class="form-control{{ $errors->has('title_post') ? ' is-invalid' : '' }}" name="priority" required>
                        <datalist id="berita_terkini">
                            <option value="Berita Terkini">Berita Terkini</option>
                        </datalist>
                        {!! $errors->first('priority', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="file" name="image_post" id="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Buat Post" class="btn btn-success">
                        <a href="{{ route('posts.index') }}" class="btn btn-link">Batal</a>
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
            $('#summernote').summernote();
        });
    </script>
@endsection
