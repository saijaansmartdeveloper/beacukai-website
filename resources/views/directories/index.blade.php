@extends('layouts.admin')

@section('title', 'Daftar Peraturan')

@section('content')
<div class="mb-3">
    <div class="">
        @can('create', new App\Models\Directory)
            <a href="{{ route('directories.create') }}" class="btn btn-success">Tambah Peraturan</a>
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('directory.search') }}</label>
                        <select name="type" id="type" class="form-control mx-sm-2"><option value="jenis_peraturan">Jenis Peraturan</option><option value="tentang_peraturan">Tentang Peraturan</option><option value="nomor_peraturan">No Peraturan</option></select>
                        <input placeholder="{{ __('directory.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('directory.search') }}" class="btn btn-secondary">
                    <a href="{{ route('directories.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>

            <div class="card-body">
                <table class="table table-sm table-responsive-sm table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Jenis Peraturan</th>
                            <th>Nomor Peraturan</th>
                            <th>Tentang Peraturan</th>
                            <th>Tahun Peraturan</th>
                            <th>File</th>
                            <th class="text-center">{{ __('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($directories as $key => $directory)
                        <tr>
                            <td class="text-center">{{ $directories->firstItem() + $key }}</td>
                            <td>{{ $directory->jenis_peraturan }}</td>
                            <td>{{ $directory->nomor_peraturan }}</td>
                            <td>{{ $directory->tentang_peraturan }}</td>
                            <td>{{ $directory->tahun_peraturan }}</td>
                            <td><a href="{{ asset('storage/' . $directory->file_peraturan) }}" target="_blank">File</a></td>
                            <td class="text-center">
                                @can('update', $directory)
                                    <a href="{{ route('directories.edit', $directory) }}" id="edit-directory-{{ $directory->id }}" class="btn btn-success">Ubah</a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $directories->appends(Request::except('page'))->render() }}
            </div>
        </div>
    </div>
</div>
@endsection
