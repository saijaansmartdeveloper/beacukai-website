@extends('layouts.admin')

@section('title', "Daftar Layanan")

@section('content')
<div class="mb-3">
    <div class="">
        @can('create', new App\Models\Layanan)
            <a href="{{ route('layanans.create') }}" class="btn btn-success">Tambah Layanan</a>
        @endcan
    </div>
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
            <div class="card-body table-responsive-sm ">
                <table class="table table-sm table-hover table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Layanan</th>
                        <th>Jenis Layanan</th>
                        <th>Estimasi Layanan</th>
                        <th>Waktu Layanan</th>
                        <th>Biaya Layanan</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($layanans as $key => $layanan)
                        <tr>
                            <td class="text-center">{{ $layanans->firstItem() + $key }}</td>
                            <td>{!! $layanan->title_link !!}</td>
                            <td>{{ $layanan->jenis_layanan }}</td>
                            <td>{{ $layanan->estimasi_layanan }}</td>
                            <td>{{ $layanan->waktu_layanan }}</td>
                            <td class="text-center">{{ $layanan->biaya_layanan }}</td>
                            <td class="text-center">
                                @can('view', $layanan)
                                    <a href="{{ route('layanans.edit', $layanan) }}" id="edit-layanan-{{ $layanan->id }}" class="btn btn-success btn-sm">Ubah</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $layanans->appends(Request::except('page'))->render() }}
            </div>
        </div>
    </div>
</div>
@endsection
