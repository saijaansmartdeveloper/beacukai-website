@extends('layouts.app')

@section('title', __('layanan.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $layanan)
        @can('delete', $layanan)
            <div class="card">
                <div class="card-header">{{ __('layanan.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('layanan.title') }}</label>
                    <p>{{ $layanan->title }}</p>
                    <label class="form-label text-primary">{{ __('layanan.description') }}</label>
                    <p>{{ $layanan->description }}</p>
                    {!! $errors->first('layanan_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('layanan.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('layanans.destroy', $layanan) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="layanan_id" type="hidden" value="{{ $layanan->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('layanans.edit', $layanan) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('layanan.edit') }}</div>
            <form method="POST" action="{{ route('layanans.update', $layanan) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">{{ __('layanan.title') }} <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $layanan->title) }}" required>
                        {!! $errors->first('title', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('layanan.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $layanan->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('layanan.update') }}" class="btn btn-success">
                    <a href="{{ route('layanans.show', $layanan) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $layanan)
                        <a href="{{ route('layanans.edit', [$layanan, 'action' => 'delete']) }}" id="del-layanan-{{ $layanan->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
