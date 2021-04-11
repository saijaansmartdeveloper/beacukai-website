@extends('layouts.admin')

@section('title', __('testimoni.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @if (request('action') == 'delete' && $testimoni)
        @can('delete', $testimoni)
            <div class="card">
                <div class="card-body">
                    <label class="form-label text-primary">Nama Pemberi Testimoni</label>
                    <p>{{ $testimoni->name_testimoni }}</p>
                    <label class="form-label text-primary">Perusahaan Pemberi Testimoni</label>
                    <p>{{ $testimoni->company_testimoni }}</p>
                    <label class="form-label text-primary">Testimoni</label>
                    <p>{{ $testimoni->testimoni }}</p>

                    {!! $errors->first('testimoni_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('testimoni.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('testimonis.destroy', $testimoni) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="testimoni_id" type="hidden" value="{{ $testimoni->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('testimonis.edit', $testimoni) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <form method="POST" action="{{ route('testimonis.update', $testimoni) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_testimoni" class="form-label">Nama Pemberi Testimoni <span class="form-required">*</span></label>
                        <input id="name_testimoni" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="name_testimoni" value="{{ old('name_testimoni', $testimoni->name_testimoni) }}" required>
                        {!! $errors->first('name_testimoni', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="company_testimoni" class="form-label">Nama Perusahaan / Divisi Perusahaan <span class="form-required">*</span></label>
                        <input id="company_testimoni" type="text" class="form-control{{ $errors->has('company_testimoni') ? ' is-invalid' : '' }}" name="company_testimoni" value="{{ old('company_testimoni', $testimoni->company_testimoni) }}" required>
                        {!! $errors->first('company_testimoni', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="testimoni" class="form-label">Testimoni</label>
                        <textarea id="testimoni" class="form-control{{ $errors->has('testimoni') ? ' is-invalid' : '' }}" name="testimoni" rows="4">{{ old('testimoni', $testimoni->testimoni) }}</textarea>
                        {!! $errors->first('testimoni', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-success">
                        <a href="{{ route('testimonis.show', $testimoni) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                        @can('delete', $testimoni)
                            <a href="{{ route('testimonis.edit', [$testimoni, 'action' => 'delete']) }}" id="del-testimoni-{{ $testimoni->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                        @endcan
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
