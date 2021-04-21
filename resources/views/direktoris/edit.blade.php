@extends('layouts.app')

@section('title', __('direktori.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $direktori)
        @can('delete', $direktori)
            <div class="card">
                <div class="card-header">{{ __('direktori.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('direktori.title') }}</label>
                    <p>{{ $direktori->title }}</p>
                    <label class="form-label text-primary">{{ __('direktori.description') }}</label>
                    <p>{{ $direktori->description }}</p>
                    {!! $errors->first('direktori_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('direktori.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('direktoris.destroy', $direktori) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="direktori_id" type="hidden" value="{{ $direktori->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('direktoris.edit', $direktori) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('direktori.edit') }}</div>
            <form method="POST" action="{{ route('direktoris.update', $direktori) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">{{ __('direktori.title') }} <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $direktori->title) }}" required>
                        {!! $errors->first('title', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('direktori.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $direktori->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('direktori.update') }}" class="btn btn-success">
                    <a href="{{ route('direktoris.show', $direktori) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $direktori)
                        <a href="{{ route('direktoris.edit', [$direktori, 'action' => 'delete']) }}" id="del-direktori-{{ $direktori->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
