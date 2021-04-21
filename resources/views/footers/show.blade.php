@extends('layouts.app')

@section('title', __('footer.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('footer.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('footer.title') }}</td><td>{{ $footer->title }}</td></tr>
                        <tr><td>{{ __('footer.description') }}</td><td>{{ $footer->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $footer)
                    <a href="{{ route('footers.edit', $footer) }}" id="edit-footer-{{ $footer->id }}" class="btn btn-warning">{{ __('footer.edit') }}</a>
                @endcan
                <a href="{{ route('footers.index') }}" class="btn btn-link">{{ __('footer.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
