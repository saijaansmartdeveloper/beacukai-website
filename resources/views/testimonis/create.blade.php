@extends('layouts.admin')

@section('title', "Tambah Testimoni")

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form method="POST" action="{{ route('testimonis.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_testimoni" class="form-label">Nama Pemberi Testimoni <span class="form-required">*</span></label>
                        <input id="name_testimoni" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="name_testimoni" value="{{ old('name_testimoni') }}" required>
                        {!! $errors->first('name_testimoni', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="company_testimoni" class="form-label">Nama Perusahaan / Divisi Perusahaan <span class="form-required">*</span></label>
                        <input id="company_testimoni" type="text" class="form-control{{ $errors->has('company_testimoni') ? ' is-invalid' : '' }}" name="company_testimoni" value="{{ old('company_testimoni') }}" required>
                        {!! $errors->first('company_testimoni', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="testimoni" class="form-label">Testimoni</label>
                        <textarea id="testimoni" class="form-control{{ $errors->has('testimoni') ? ' is-invalid' : '' }}" name="testimoni" rows="4">{{ old('testimoni') }}</textarea>
                        {!! $errors->first('testimoni', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{ __('testimoni.create') }}" class="btn btn-success">
                        <a href="{{ route('testimonis.index') }}" class="btn btn-link">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
