@extends('layouts.admin')

@section('title', 'Detail Banner')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm" style="width: 100%">
                    <tbody>
                        <tr><td>{{ __('banner.title') }}</td><td>{{ $banner->title_banner }}</td></tr>
                        <tr><td>{{ __('banner.description') }}</td><td>{{ $banner->description_banner }}</td></tr>
                        <tr><td>Prioritas Banner</td><td>{{ $banner->priority_banner }}</td></tr>
                        <tr><td>Status</td><td>{!! $banner->status_banner !!}</td></tr>
                        <tr><td colspan="2"><img src="{{url('storage/'.$banner->image_banner)}}" alt="" style="max-width: 100%"></td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $banner)
                    <a href="{{ route('banners.edit', $banner) }}" id="edit-banner-{{ $banner->id }}" class="btn btn-warning">Ubah Banner</a>
                @endcan
                <a href="{{ route('banners.index') }}" class="btn btn-link">Kembali Ke Banner</a>
            </div>
        </div>
    </div>
</div>
@endsection
