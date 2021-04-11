@extends('layouts.admin')

@section('title', 'Daftar Link')

@section('content')
<div class="mb-3">
    <div class="">
        @can('create', new App\Models\KotabaruLink)
            <a href="{{ route('kotabaru_links.create') }}" class="btn btn-success">Tambah Kotabaru Link</a>
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('kotabaru_link.search') }}</label>
                        <input placeholder="{{ __('kotabaru_link.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('kotabaru_link.search') }}" class="btn btn-secondary">
                    <a href="{{ route('kotabaru_links.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>Nama Link</th>
                        <th>Deskripsi Link</th>
                        <th>Link</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kotabaruLinks as $key => $kotabaruLink)
                    <tr>
                        <td class="text-center">{{ $kotabaruLinks->firstItem() + $key }}</td>
                        <td>{!! $kotabaruLink->title_link !!}</td>
                        <td>{{ $kotabaruLink->description_link }}</td>
                        <td>{{ $kotabaruLink->external_link }}</td>
                        <td class="text-center">
                            @can('view', $kotabaruLink)
                                <a href="{{ route('kotabaru_links.show', $kotabaruLink) }}" id="show-kotabaru_link-{{ $kotabaruLink->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $kotabaruLinks->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
