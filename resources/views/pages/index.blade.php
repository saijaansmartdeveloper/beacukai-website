@extends('layouts.admin')

@section('title', 'Daftar Halaman')

@section('content')
<div class="mb-3">
    <div>
        @can('create', new App\Models\Page)
            <a href="{{ route('pages.create') }}" class="btn btn-success">Tambah Halaman</a>
        @endcan
    </div>
    {{-- <h1 class="page-title">{{ __('banner.list') }} <small>{{ __('app.total') }} : {{ $banners->total() }} {{ __('banner.banner') }}</small></h1> --}}
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('page.search') }}</label>
                        <input placeholder="{{ __('page.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('page.search') }}" class="btn btn-secondary">
                    <a href="{{ route('pages.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>Nama Halaman</th>
                        <th>Deskripsi Halaman</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $key => $page)
                    <tr>
                        <td class="text-center">{{ $pages->firstItem() + $key }}</td>
                        <td>{!! $page->title_link !!}</td>
                        <td>{{ $page->description_page }}</td>
                        <td class="text-center">
                            @can('view', $page)
                                <a href="{{ route('pages.show', $page) }}" id="show-page-{{ $page->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $pages->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
