@extends('layouts.admin')

@section('title', 'Daftar Banner')

@section('content')
<div class="mb-3">
    <div>
        @can('create', new App\Models\Banner)
            <a href="{{ route('banners.create') }}" class="btn btn-success">Tambah Banner</a>
        @endcan
    </div>
    {{-- <h1 class="page-title">{{ __('banner.list') }} <small>{{ __('app.total') }} : {{ $banners->total() }} {{ __('banner.banner') }}</small></h1> --}}
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('banner.search') }}</label>
                        <input placeholder="{{ __('banner.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('banner.search') }}" class="btn btn-secondary">
                    <a href="{{ route('banners.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>

            <div class="card-body">
                <table class="table table-sm table-responsive-sm table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Judul Banner</th>
                            <th>Deskripsi Banner</th>
                            <th>Prioritas</th>
                            <th>Status</th>
                            <th class="text-center">{{ __('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $key => $banner)
                        <tr>
                            <td class="text-center">{{ $banners->firstItem() + $key }}</td>
                            <td>{!! $banner->title_link !!}</td>
                            <td>{{ $banner->description_banner }}</td>
                            <td>{{ $banner->priority_banner }}</td>
                            <td>{!! $banner->status_banner !!}</td>
                            <td class="text-center">
                                @can('view', $banner)
                                    <a href="{{ route('banners.show', $banner) }}" id="show-banner-{{ $banner->id }}">{{ __('app.show') }}</a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $banners->appends(Request::except('page'))->render() }}
            </div>
        </div>
    </div>
</div>
@endsection
