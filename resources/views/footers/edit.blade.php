@extends('layouts.app')

@section('title', __('footer.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $footer)
        @can('delete', $footer)
            <div class="card">
                <div class="card-header">{{ __('footer.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('footer.title') }}</label>
                    <p>{{ $footer->title }}</p>
                    <label class="form-label text-primary">{{ __('footer.description') }}</label>
                    <p>{{ $footer->description }}</p>
                    {!! $errors->first('footer_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('footer.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('footers.destroy', $footer) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="footer_id" type="hidden" value="{{ $footer->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('footers.edit', $footer) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('footer.edit') }}</div>
            <form method="POST" action="{{ route('footers.update', $footer) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">{{ __('footer.title') }} <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $footer->title) }}" required>
                        {!! $errors->first('title', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('footer.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $footer->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('footer.update') }}" class="btn btn-success">
                    <a href="{{ route('footers.show', $footer) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $footer)
                        <a href="{{ route('footers.edit', [$footer, 'action' => 'delete']) }}" id="del-footer-{{ $footer->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
