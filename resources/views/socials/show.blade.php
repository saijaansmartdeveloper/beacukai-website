@extends('layouts.app')

@section('title', __('social.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('social.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('social.title') }}</td><td>{{ $social->title }}</td></tr>
                        <tr><td>{{ __('social.description') }}</td><td>{{ $social->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $social)
                    <a href="{{ route('socials.edit', $social) }}" id="edit-social-{{ $social->id }}" class="btn btn-warning">{{ __('social.edit') }}</a>
                @endcan
                <a href="{{ route('socials.index') }}" class="btn btn-link">{{ __('social.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
