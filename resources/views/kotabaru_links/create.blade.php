@extends('layouts.admin')

@section('title', 'Tambah Media Link')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form method="POST" action="{{ route('kotabaru_links.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title_link" class="form-label">Nama Media Link <span class="form-required">*</span></label>
                        <input id="title_link" type="text" class="form-control{{ $errors->has('title_link') ? ' is-invalid' : '' }}" name="title_link" value="{{ old('title_link') }}" required>
                        {!! $errors->first('title_link', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description_link" class="form-label">Deskripsi Media Link</label>
                        <textarea id="description_link" class="form-control{{ $errors->has('description_link') ? ' is-invalid' : '' }}" name="description_link" rows="4">{{ old('description_link') }}</textarea>
                        {!! $errors->first('description_link', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="external_link" class="form-label">Eksternal Link <span class="form-required">*</span></label>
                        <input id="external_link" type="text" class="form-control{{ $errors->has('external_link') ? ' is-invalid' : '' }}" name="external_link" value="{{ old('external_link') }}" required>
                        {!! $errors->first('external_link', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="file" name="image_link">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Tambah media Link" class="btn btn-success">
                        <a href="{{ route('kotabaru_links.index') }}" class="btn btn-link">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
