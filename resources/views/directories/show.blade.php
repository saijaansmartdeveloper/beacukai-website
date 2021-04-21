@extends('layouts.app')

@section('title', __('directory.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('directory.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('directory.title') }}</td><td>{{ $directory->title }}</td></tr>
                        <tr><td>{{ __('directory.description') }}</td><td>{{ $directory->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $directory)
                    <a href="{{ route('directories.edit', $directory) }}" id="edit-directory-{{ $directory->id }}" class="btn btn-warning">{{ __('directory.edit') }}</a>
                @endcan
                <a href="{{ route('directories.index') }}" class="btn btn-link">{{ __('directory.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
