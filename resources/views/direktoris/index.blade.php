@extends('layouts.app')

@section('title', __('direktori.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Direktori)
            <a href="{{ route('direktoris.create') }}" class="btn btn-success">{{ __('direktori.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('direktori.list') }} <small>{{ __('app.total') }} : {{ $direktoris->total() }} {{ __('direktori.direktori') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('direktori.search') }}</label>
                        <input placeholder="{{ __('direktori.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('direktori.search') }}" class="btn btn-secondary">
                    <a href="{{ route('direktoris.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('direktori.title') }}</th>
                        <th>{{ __('direktori.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($direktoris as $key => $direktori)
                    <tr>
                        <td class="text-center">{{ $direktoris->firstItem() + $key }}</td>
                        <td>{!! $direktori->title_link !!}</td>
                        <td>{{ $direktori->description }}</td>
                        <td class="text-center">
                            @can('view', $direktori)
                                <a href="{{ route('direktoris.show', $direktori) }}" id="show-direktori-{{ $direktori->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $direktoris->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
