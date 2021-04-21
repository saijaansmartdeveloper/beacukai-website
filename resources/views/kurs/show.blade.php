@extends('layouts.app')

@section('title', __('kurs.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('kurs.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('kurs.title') }}</td><td>{{ $kurs->title }}</td></tr>
                        <tr><td>{{ __('kurs.description') }}</td><td>{{ $kurs->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $kurs)
                    <a href="{{ route('kurs.edit', $kurs) }}" id="edit-kurs-{{ $kurs->id }}" class="btn btn-warning">{{ __('kurs.edit') }}</a>
                @endcan
                <a href="{{ route('kurs.index') }}" class="btn btn-link">{{ __('kurs.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
