@extends('layouts.app')

@section('title', __('social.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $social)
        @can('delete', $social)
            <div class="card">
                <div class="card-header">{{ __('social.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('social.title') }}</label>
                    <p>{{ $social->title }}</p>
                    <label class="form-label text-primary">{{ __('social.description') }}</label>
                    <p>{{ $social->description }}</p>
                    {!! $errors->first('social_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('social.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('socials.destroy', $social) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="social_id" type="hidden" value="{{ $social->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('socials.edit', $social) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('social.edit') }}</div>
            <form method="POST" action="{{ route('socials.update', $social) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">{{ __('social.title') }} <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $social->title) }}" required>
                        {!! $errors->first('title', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('social.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $social->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('social.update') }}" class="btn btn-success">
                    <a href="{{ route('socials.show', $social) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $social)
                        <a href="{{ route('socials.edit', [$social, 'action' => 'delete']) }}" id="del-social-{{ $social->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
