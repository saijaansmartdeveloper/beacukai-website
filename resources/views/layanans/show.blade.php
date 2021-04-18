@extends('layouts.app')

@section('title', __('layanan.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('layanan.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('layanan.title') }}</td><td>{{ $layanan->title }}</td></tr>
                        <tr><td>{{ __('layanan.description') }}</td><td>{{ $layanan->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $layanan)
                    <a href="{{ route('layanans.edit', $layanan) }}" id="edit-layanan-{{ $layanan->id }}" class="btn btn-warning">{{ __('layanan.edit') }}</a>
                @endcan
                <a href="{{ route('layanans.index') }}" class="btn btn-link">{{ __('layanan.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
