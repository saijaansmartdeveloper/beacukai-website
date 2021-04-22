@extends('layouts.admin')

@section('title', "Ubah Profil")

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card">
            <form method="POST" action="{{ route('footers.update', $footer) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_instansi" class="form-label">Nama Instansi <span class="form-required">*</span></label>
                        <input id="nama_instansi" type="text" class="form-control{{ $errors->has('nama_instansi') ? ' is-invalid' : '' }}" name="nama_instansi" value="{{ old('nama_instansi', $footer->nama_instansi) }}" required>
                        {!! $errors->first('nama_instansi', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_instansi" class="form-label">Deskripsi <span class="form-required">*</span></label>
                        <textarea id="deskripsi_instansi" class="form-control{{ $errors->has('deskripsi_instansi') ? ' is-invalid' : '' }}" name="deskripsi_instansi">{{ old('deskripsi_instansi', $footer->deskripsi_instansi) }}</textarea>
                        {!! $errors->first('deskripsi_instansi', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="alamat_instansi" class="form-label">Alamat <span class="form-required">*</span></label>
                        <input id="alamat_instansi" type="text" class="form-control{{ $errors->has('alamat_instansi') ? ' is-invalid' : '' }}" name="alamat_instansi" value="{{ old('alamat_instansi', $footer->alamat_instansi) }}" required>
                        {!! $errors->first('alamat_instansi', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="email_instansi" class="form-label">Email <span class="form-required">*</span></label>
                        <input id="email_instansi" type="text" class="form-control{{ $errors->has('email_instansi') ? ' is-invalid' : '' }}" name="email_instansi" value="{{ old('email_instansi', $footer->email_instansi) }}" required>
                        {!! $errors->first('email_instansi', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="web_instansi" class="form-label">Web <span class="form-required">*</span></label>
                        <input id="web_instansi" type="text" class="form-control{{ $errors->has('web_instansi') ? ' is-invalid' : '' }}" name="web_instansi" value="{{ old('web_instansi', $footer->web_instansi) }}" required>
                        {!! $errors->first('web_instansi', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="telp_instansi" class="form-label">Telpon <span class="form-required">*</span></label>
                        <input id="telp_instansi" type="text" class="form-control{{ $errors->has('telp_instansi') ? ' is-invalid' : '' }}" name="telp_instansi" value="{{ old('telp_instansi', $footer->telp_instansi) }}" required>
                        {!! $errors->first('telp_instansi', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="maps_instansi" class="form-label">Maps <span class="form-required">*</span></label>
                        <textarea id="maps_instansi" class="form-control{{ $errors->has('maps_instansi') ? ' is-invalid' : '' }}" name="maps_instansi" rows="4">{{ old('maps_instansi', $footer->maps_instansi) }}</textarea>
                        {!! $errors->first('maps_instansi', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-success">
                        <a href="{{ route('footers.show', $footer) }}" class="btn btn-link">Batal</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
