@extends('layouts.admin')

@section('title', 'Tambah Siring')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form method="POST" action="{{ route('sirings.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_siring" class="form-label">Nama Menu Siring <span class="form-required">*</span></label>
                        <input id="name_siring" type="text" class="form-control{{ $errors->has('name_siring') ? ' is-invalid' : '' }}" name="name_siring" value="{{ old('name_siring') }}" required>
                        {!! $errors->first('name_siring', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description_siring" class="form-label">Deskripsi Menu Siring</label>
                        <textarea id="description_siring" class="form-control{{ $errors->has('description_siring') ? ' is-invalid' : '' }}" name="description_siring" rows="2">{{ old('description_siring') }}</textarea>
                        {!! $errors->first('description_siring', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="link_siring" class="form-label">Link Menu Siring <span class="form-required">*</span></label>
                        <input id="link_siring" type="text" class="form-control{{ $errors->has('link_siring') ? ' is-invalid' : '' }}" name="link_siring" value="{{ old('name_siring') }}" required>
                        {!! $errors->first('link_siring', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="icon_siring" class="form-label">Icon Siring <span class="form-required">*</span></label>
                        <input id="icon_siring" type="text" class="form-control{{ $errors->has('icon_siring') ? ' is-invalid' : '' }}" name="icon_siring" value="{{ old('name_siring') }}" required>
                        {!! $errors->first('icon_siring', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="is_priority" class="form-label">Urutasn Prioritas <span class="form-required">*</span></label>
                        <input id="is_priority" type="number" class="form-control{{ $errors->has('is_priority') ? ' is-invalid' : '' }}" name="is_priority" value="{{ old('name_siring') }}" required>
                        {!! $errors->first('is_priority', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Tambah Menu" class="btn btn-success">
                        <a href="{{ route('sirings.index') }}" class="btn btn-link">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
