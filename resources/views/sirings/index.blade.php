@extends('layouts.admin')

@section('title', 'Daftar Menu Siring')

@section('content')
<div class="mb-3">
    <div class="">
        @can('create', new App\Models\Siring)
            <a href="{{ route('sirings.create') }}" class="btn btn-success">Tambah Siring</a>
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('siring.search') }}</label>
                        <input placeholder="{{ __('siring.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('siring.search') }}" class="btn btn-secondary">
                    <a href="{{ route('sirings.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>Nama Menu Siring</th>
                        <th>Deskripsi Menu Siring</th>
                        <th>Link Menu Siring</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sirings as $key => $siring)
                    <tr>
                        <td class="text-center">{{ $sirings->firstItem() + $key }}</td>
                        <td>{!! $siring->title_link !!}</td>
                        <td>{{ $siring->description_siring }}</td>
                        <td>{{ $siring->link_siring }}</td>
                        <td class="text-center">
                            @can('view', $siring)
                                <a href="{{ route('sirings.show', $siring) }}" id="show-siring-{{ $siring->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $sirings->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
