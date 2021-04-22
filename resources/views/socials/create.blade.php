@extends('layouts.admin')

@section('title', "Tambah Link Sosial")

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form method="POST" action="{{ route('socials.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title_social" class="form-label">Nama <span class="form-required">*</span></label>
                        <input id="title_social" type="text" class="form-control{{ $errors->has('title_social') ? ' is-invalid' : '' }}" name="title_social" value="{{ old('title_social') }}" required>
                        {!! $errors->first('title_social', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description_social" class="form-label">Deskripsi <span class="form-required">*</span></label>
                        <input id="description_social" type="text" class="form-control{{ $errors->has('description_social') ? ' is-invalid' : '' }}" name="description_social" value="{{ old('description_social') }}" required>
                        {!! $errors->first('description_social', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="icon_social" class="form-label">Icon <span class="form-required">*</span></label>
                        <input id="icon_social" type="text" class="form-control{{ $errors->has('icon_social') ? ' is-invalid' : '' }}" name="icon_social" value="{{ old('icon_social') }}" required>
                        {!! $errors->first('icon_social', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="link_social" class="form-label">Link <span class="form-required">*</span></label>
                        <input id="link_social" type="text" class="form-control{{ $errors->has('link_social') ? ' is-invalid' : '' }}" name="link_social" value="{{ old('link_social') }}" required>
                        {!! $errors->first('link_social', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Tambah Link Sosial" class="btn btn-success">
                        <a href="{{ route('socials.index') }}" class="btn btn-link">Kembali</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
