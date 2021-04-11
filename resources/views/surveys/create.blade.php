@extends('layouts.admin')

@section('title', 'Tambah Survey')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form method="POST" action="{{ route('surveys.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_survey" class="form-label">Nama Survey<span class="form-required">*</span></label>
                        <input id="name_survey" type="text" class="form-control{{ $errors->has('name_survey') ? ' is-invalid' : '' }}" name="name_survey" value="{{ old('name_survey') }}" required>
                        {!! $errors->first('name_survey', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description_survey" class="form-label">Deskripsi Survey</label>
                        <textarea id="description_survey" class="form-control{{ $errors->has('description_survey') ? ' is-invalid' : '' }}" name="description_survey" rows="4">{{ old('description_survey') }}</textarea>
                        {!! $errors->first('description_survey', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="tahun_survey" class="form-label">Tahun Survey<span class="form-required">*</span></label>
                        <input id="tahun_survey" type="number" class="form-control{{ $errors->has('tahun_survey') ? ' is-invalid' : '' }}" name="tahun_survey" value="{{ old('tahun_survey') }}" min="0" required>
                        {!! $errors->first('tahun_survey', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="is_active_survey" class="form-label">Status<span class="form-required">*</span></label>
                        <select id="is_active_survey" class="form-control{{ $errors->has('is_active_survey') ? ' is-invalid' : '' }}" name="is_active_survey">
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                        {!! $errors->first('is_active_survey', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input id="file_survey" type="file"  name="file_survey" value="{{ old('file_survey') }}">
                        {!! $errors->first('file_survey', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-grou">
                        <input type="submit" value="Simpan Survey" class="btn btn-success">
                        <a href="{{ route('surveys.index') }}" class="btn btn-link">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
