@extends('layouts.admin')

@section('title', "Daftar Link Sosial Media")

@section('content')
<div class="mb-3">
    <div>
        @can('create', new App\Models\Social)
            <a href="{{ route('socials.create') }}" class="btn btn-success">Tambah Link Sosial Media</a>
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('social.search') }}</label>
                        <input placeholder="{{ __('social.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('social.search') }}" class="btn btn-secondary">
                    <a href="{{ route('socials.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>

            <div class="card-body">
                <table class="table table-sm table-responsive-sm table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('app.table_no') }}</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Icon</th>
                            <th>Link</th>
                            <th class="text-center">{{ __('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($socials as $key => $social)
                        <tr>
                            <td class="text-center">{{ $socials->firstItem() + $key }}</td>
                            <td>{!! $social->title_link !!}</td>
                            <td>{{ $social->description_social }}</td>
                            <td>{{ $social->icon_social }}</td>
                            <td>{{ $social->link_social }}</td>
                            <td class="text-center">
                                @can('view', $social)
                                    <a href="{{ route('socials.show', $social) }}" id="show-social-{{ $social->id }}">{{ __('app.show') }}</a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $socials->appends(Request::except('page'))->render() }}
            </div>
        </div>
    </div>
</div>
@endsection
