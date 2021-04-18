@extends('layouts.app')

@section('title', __('layanan.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Layanan)
            <a href="{{ route('layanans.create') }}" class="btn btn-success">{{ __('layanan.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('layanan.list') }} <small>{{ __('app.total') }} : {{ $layanans->total() }} {{ __('layanan.layanan') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('layanan.search') }}</label>
                        <input placeholder="{{ __('layanan.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('layanan.search') }}" class="btn btn-secondary">
                    <a href="{{ route('layanans.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('layanan.title') }}</th>
                        <th>{{ __('layanan.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($layanans as $key => $layanan)
                    <tr>
                        <td class="text-center">{{ $layanans->firstItem() + $key }}</td>
                        <td>{!! $layanan->title_link !!}</td>
                        <td>{{ $layanan->description }}</td>
                        <td class="text-center">
                            @can('view', $layanan)
                                <a href="{{ route('layanans.show', $layanan) }}" id="show-layanan-{{ $layanan->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $layanans->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
