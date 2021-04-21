@extends('layouts.app')

@section('title', __('direktori.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('direktori.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('direktori.title') }}</td><td>{{ $direktori->title }}</td></tr>
                        <tr><td>{{ __('direktori.description') }}</td><td>{{ $direktori->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $direktori)
                    <a href="{{ route('direktoris.edit', $direktori) }}" id="edit-direktori-{{ $direktori->id }}" class="btn btn-warning">{{ __('direktori.edit') }}</a>
                @endcan
                <a href="{{ route('direktoris.index') }}" class="btn btn-link">{{ __('direktori.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
