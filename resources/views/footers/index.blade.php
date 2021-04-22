@extends('layouts.admin')

@section('title', __('footer.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Footer)
            <a href="{{ route('footers.create') }}" class="btn btn-success">{{ __('footer.create') }}</a>
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('footer.search') }}</label>
                        <input placeholder="{{ __('footer.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('footer.search') }}" class="btn btn-secondary">
                    <a href="{{ route('footers.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('footer.title') }}</th>
                        <th>{{ __('footer.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($footers as $key => $footer)
                    <tr>
                        <td class="text-center">{{ $footers->firstItem() + $key }}</td>
                        <td>{!! $footer->title_link !!}</td>
                        <td>{{ $footer->description }}</td>
                        <td class="text-center">
                            @can('view', $footer)
                                <a href="{{ route('footers.show', $footer) }}" id="show-footer-{{ $footer->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $footers->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
