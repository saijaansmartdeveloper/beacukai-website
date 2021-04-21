@extends('layouts.admin')

@section('title', "Ubah Layanan")

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @if (request('action') == 'delete' && $layanan)
        @can('delete', $layanan)
            <div class="card">
                <div class="card-body">
                    <label class="form-label text-primary">Nama Layanan</label>
                    <p>{{ $layanan->nama_layanan }}</p>
                    {!! $errors->first('layanan_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">Apakah anda yakin?</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('layanans.destroy', $layanan) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="layanan_id" type="hidden" value="{{ $layanan->id }}">
                        <button type="submit" class="btn btn-danger">Ya, hapus sekarang!</button>
                    </form>
                    <a href="{{ route('layanans.edit', $layanan) }}" class="btn btn-link">Batal</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <form method="POST" action="{{ route('layanans.update', $layanan) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Nama Layanan <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('nama_layanan') ? ' is-invalid' : '' }}" name="nama_layanan" value="{{ old('title', $layanan->nama_layanan) }}" required>
                        {!! $errors->first('nama_layanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Jenis Pelayanan <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('jenis_layanan') ? ' is-invalid' : '' }}" name="jenis_layanan" value="{{ old('title', $layanan->jenis_layanan) }}" required>
                        {!! $errors->first('jenis_layanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Waktu Layanan <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('waktu_layanan') ? ' is-invalid' : '' }}" name="waktu_layanan" value="{{ old('title', $layanan->waktu_layanan) }}" required>
                        {!! $errors->first('waktu_layanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Estimasi Layanan <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('estimasi_layanan') ? ' is-invalid' : '' }}" name="estimasi_layanan" value="{{ old('title', $layanan->estimasi_layanan) }}" required>
                        {!! $errors->first('estimasi_layanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Biaya Layanan <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('biaya_layanan') ? ' is-invalid' : '' }}" name="biaya_layanan" value="{{ old('title', $layanan->biaya_layanan) }}" required>
                        {!! $errors->first('biaya_layanan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Perbarui" class="btn btn-success">
                        <a href="{{ route('layanans.show', $layanan) }}" class="btn btn-link">Kembali</a>
                        @can('delete', $layanan)
                            <a href="{{ route('layanans.edit', [$layanan, 'action' => 'delete']) }}" id="del-layanan-{{ $layanan->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                        @endcan
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
