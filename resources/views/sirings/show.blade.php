@extends('layouts.admin')

@section('title', __('siring.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>Nama Menu Siring</td><td>{{ $siring->name_siring }}</td></tr>
                        <tr><td>Deskripsi Menu Siring</td><td>{{ $siring->description_siring }}</td></tr>
                        <tr><td>Icon Menu Siring</td><td>{{ $siring->icon_siring }}</td></tr>
                        <tr><td>Link Menu Siring</td><td>{!! $siring->link_siring !!}</td></tr>
                        <tr><td>Urutan Menu Siring</td><td>{!! $siring->is_priority !!}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $siring)
                    <a href="{{ route('sirings.edit', $siring) }}" id="edit-siring-{{ $siring->id }}" class="btn btn-warning">{{ __('siring.edit') }}</a>
                @endcan
                <a href="{{ route('sirings.index') }}" class="btn btn-link">{{ __('siring.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
