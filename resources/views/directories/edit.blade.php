@extends('layouts.app')

@section('title', __('directory.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $directory)
        @can('delete', $directory)
            <div class="card">
                <div class="card-header">{{ __('directory.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('directory.title') }}</label>
                    <p>{{ $directory->title }}</p>
                    <label class="form-label text-primary">{{ __('directory.description') }}</label>
                    <p>{{ $directory->description }}</p>
                    {!! $errors->first('directory_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('directory.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('directories.destroy', $directory) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="directory_id" type="hidden" value="{{ $directory->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('directories.edit', $directory) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('directory.edit') }}</div>
            <form method="POST" action="{{ route('directories.update', $directory) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">{{ __('directory.title') }} <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $directory->title) }}" required>
                        {!! $errors->first('title', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('directory.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $directory->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('directory.update') }}" class="btn btn-success">
                    <a href="{{ route('directories.show', $directory) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $directory)
                        <a href="{{ route('directories.edit', [$directory, 'action' => 'delete']) }}" id="del-directory-{{ $directory->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
