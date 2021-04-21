@extends('layouts.admin')

@section('title', 'Tambah Kurs')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form method="POST" action="{{ route('kurs.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Nama Mata Uang <span class="form-required">*</span></label>
                        <input id="nama_mata_uang" type="text" class="form-control{{ $errors->has('nama_mata_uang') ? ' is-invalid' : '' }}" name="nama_mata_uang" value="{{ old('nama_mata_uang') }}" required>
                        {!! $errors->first('nama_mata_uang', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Nilai Mata Uang <span class="form-required">*</span></label>
                        <input id="nilai" type="text" class="form-control{{ $errors->has('nilai') ? ' is-invalid' : '' }}" name="nilai" value="{{ old('nilai') }}" required>
                        {!! $errors->first('nilai', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Nilai Perubahan <span class="form-required">*</span></label>
                        <input id="perubahan" type="text" class="form-control{{ $errors->has('perubahan') ? ' is-invalid' : '' }}" name="perubahan" value="{{ old('perubahan') }}" required>
                        {!! $errors->first('perubahan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Status Perubahan <span class="form-required">*</span></label>
                        <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                            <option value="naik">Naik</option>
                            <option value="turun">Turun</option>
                        </select>
{{--                        <input id="status" type="text" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status') }}" required>--}}
                        {!! $errors->first('status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Periode Berlaku <span class="form-required">*</span></label>
                        <input id="tanggal_berlaku" type="text" class="form-control{{ $errors->has('tanggal_berlaku') ? ' is-invalid' : '' }}" name="tanggal_berlaku" value="{{ old('tanggal_berlaku') }}" required>
                        {!! $errors->first('tanggal_berlaku', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Tambah Kurs" class="btn btn-success">
                        <a href="{{ route('kurs.index') }}" class="btn btn-link">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
