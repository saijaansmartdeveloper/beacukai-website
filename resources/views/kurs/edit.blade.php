@extends('layouts.admin')

@section('title', "Ubah Kurs")

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @if (request('action') == 'delete' && $kur)
        @can('delete', $kur)
            <div class="card">
                <div class="card-body">
                    <label class="form-label text-primary">Nama Mata Uang</label>
                    <p>{{ $kur->nama_mata_uang }}</p>
                    {!! $errors->first('kur_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">Apakah anda yakin?</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('kurs.destroy', $kur) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="kurs_id" type="hidden" value="{{ $kur->id }}">
                        <button type="submit" class="btn btn-danger">Ya, Hapus Sekarang!</button>
                    </form>
                    <a href="{{ route('kurs.edit', $kur) }}" class="btn btn-link">Batal</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <form method="POST" action="{{ route('kurs.update', $kur) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Nama Mata Uang <span class="form-required">*</span></label>
                        <input id="nama_mata_uang" type="text" class="form-control{{ $errors->has('nama_mata_uang') ? ' is-invalid' : '' }}" name="nama_mata_uang" value="{{ old('nama_mata_uang', $kur->nama_mata_uang) }}" required>
                        {!! $errors->first('nama_mata_uang', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Nilai Mata Uang <span class="form-required">*</span></label>
                        <input id="nilai" type="text" class="form-control{{ $errors->has('nilai') ? ' is-invalid' : '' }}" name="nilai" value="{{ old('nilai', $kur->nilai) }}" required>
                        {!! $errors->first('nilai', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Nilai Perubahan <span class="form-required">*</span></label>
                        <input id="perubahan" type="text" class="form-control{{ $errors->has('perubahan') ? ' is-invalid' : '' }}" name="perubahan" value="{{ old('perubahan', $kur->perubahan) }}" required>
                        {!! $errors->first('perubahan', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Status Perubahan <span class="form-required">*</span></label>
                        <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                            <option value="naik" selected="{{$kur->status == 'naik' ? 'true' : 'false'}}">Naik</option>
                            <option value="turun" selected="{{$kur->status == 'turun' ? 'true' : 'false'}}">Turun</option>
                        </select>
                        {{--                        <input id="status" type="text" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status') }}" required>--}}
                        {!! $errors->first('status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Periode Berlaku <span class="form-required">*</span></label>
                        <input id="tanggal_berlaku" type="text" class="form-control{{ $errors->has('tanggal_berlaku') ? ' is-invalid' : '' }}" name="tanggal_berlaku" value="{{ old('tanggal_berlaku', $kur->tanggal_berlaku) }}" required>
                        {!! $errors->first('tanggal_berlaku', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Ubah Kurs" class="btn btn-success">
                        <a href="{{ route('kurs.index') }}" class="btn btn-link">Batal</a>
                        @can('delete', $kur)
                            <a href="{{ route('kurs.edit', [$kur, 'action' => 'delete']) }}" id="del-kur-{{ $kur->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                        @endcan
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
