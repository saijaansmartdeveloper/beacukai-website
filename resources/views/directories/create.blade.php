@extends('layouts.admin')

@section('title', 'Tambah Dokumen Peraturan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form method="POST" action="{{ route('directories.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="jenis_peraturan" class="form-label">Masukan Jenis Peraturan<span class="form-required">*</span></label>
                        <input id="jenis_peraturan" type="text" class="form-control{{ $errors->has('jenis_peraturan') ? ' is-invalid' : '' }}" name="jenis_peraturan" value="{{ old('jenis_peraturan') }}" list="list_jenis_peraturan" required>
                        <datalist id="list_jenis_peraturan">
                        @foreach ($jenis as $item)
                            <option value="{{$item['jenis_peraturan']}}">{{$item['jenis_peraturan']}}</option>
                        @endforeach
                        </datalist>
                        {!! $errors->first('jenis_peraturan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="nomor_peraturan" class="form-label">Nomor Peraturan<span class="form-required">*</span></label>
                        <input id="nomor_peraturan" type="text" class="form-control{{ $errors->has('nomor_peraturan') ? ' is-invalid' : '' }}" name="nomor_peraturan" value="{{ old('nomor_peraturan') }}" required>
                        {!! $errors->first('nomor_peraturan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="tentang_peraturan" class="form-label">Tentang Peraturan</label>
                        <textarea id="tentang_peraturan" class="form-control{{ $errors->has('tentang_peraturan') ? ' is-invalid' : '' }}" name="tentang_peraturan" rows="4">{{ old('tentang_peraturan') }}</textarea>
                        {!! $errors->first('tentang_peraturan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="tahun_peraturan" class="form-label">Tahun Peraturan<span class="form-required">*</span></label>
                        <input id="tahun_peraturan" type="text" class="form-control{{ $errors->has('tahun_peraturan') ? ' is-invalid' : '' }}" name="tahun_peraturan" value="{{ old('tahun_peraturan') }}" required>
                        {!! $errors->first('tahun_peraturan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="file" name="file_peraturan" />
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Tambah Peraturan" class="btn btn-success">
                        <a href="{{ route('directories.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
