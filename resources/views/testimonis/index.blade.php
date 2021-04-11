@extends('layouts.admin')

@section('title', 'Daftar Testimoni')

@section('content')
<div class="mb-3">
    <div>
        @can('create', new App\Models\Testimoni)
            <a href="{{ route('testimonis.create') }}" class="btn btn-success">Tambah Testimoni</a>
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('testimoni.search') }}</label>
                        <input placeholder="{{ __('testimoni.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('testimoni.search') }}" class="btn btn-secondary">
                    <a href="{{ route('testimonis.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>Nama Pemberi Testimoni</th>
                        <th>Nama Perusahaan</th>
                        <th>Testimoni</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonis as $key => $testimoni)
                    <tr>
                        <td class="text-center">{{ $testimonis->firstItem() + $key }}</td>
                        <td>{!! $testimoni->title_link !!}</td>
                        <td>{{ $testimoni->company_testimoni }}</td>
                        <td>{{ $testimoni->testimoni }}</td>
                        <td class="text-center">
                            @can('view', $testimoni)
                                <a href="{{ route('testimonis.show', $testimoni) }}" id="show-testimoni-{{ $testimoni->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $testimonis->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
