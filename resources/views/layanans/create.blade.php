@extends('layouts.admin')

@section('title', __('layanan.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form method="POST" action="{{ route('layanans.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Nama Layanan <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('nama_layanan') ? ' is-invalid' : '' }}" name="nama_layanan" value="{{ old('title') }}" required>
                        {!! $errors->first('nama_layanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Jenis Pelayanan <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('jenis_layanan') ? ' is-invalid' : '' }}" name="jenis_layanan" value="{{ old('title') }}" required>
                        {!! $errors->first('jenis_layanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Waktu Layanan <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('waktu_layanan') ? ' is-invalid' : '' }}" name="waktu_layanan" value="{{ old('title') }}" required>
                        {!! $errors->first('waktu_layanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Estimasi Layanan <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('estimasi_layanan') ? ' is-invalid' : '' }}" name="estimasi_layanan" value="{{ old('title') }}" required>
                        {!! $errors->first('estimasi_layanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Biaya Layanan <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('biaya_layanan') ? ' is-invalid' : '' }}" name="biaya_layanan" value="{{ old('title') }}" required>
                        {!! $errors->first('biaya_layanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Tambah Layanan" class="btn btn-success">
                        <a href="{{ route('layanans.index') }}" class="btn btn-link">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
