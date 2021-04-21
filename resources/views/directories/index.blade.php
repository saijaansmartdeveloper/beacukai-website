@extends('layouts.app')

@section('title', __('directory.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Directory)
            <a href="{{ route('directories.create') }}" class="btn btn-success">{{ __('directory.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('directory.list') }} <small>{{ __('app.total') }} : {{ $directories->total() }} {{ __('directory.directory') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('directory.search') }}</label>
                        <input placeholder="{{ __('directory.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('directory.search') }}" class="btn btn-secondary">
                    <a href="{{ route('directories.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('directory.title') }}</th>
                        <th>{{ __('directory.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($directories as $key => $directory)
                    <tr>
                        <td class="text-center">{{ $directories->firstItem() + $key }}</td>
                        <td>{!! $directory->title_link !!}</td>
                        <td>{{ $directory->description }}</td>
                        <td class="text-center">
                            @can('view', $directory)
                                <a href="{{ route('directories.show', $directory) }}" id="show-directory-{{ $directory->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $directories->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
