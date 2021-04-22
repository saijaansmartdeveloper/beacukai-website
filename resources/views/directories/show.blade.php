@extends('layouts.admin')

@section('title', "Detail Peraturan")

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td>Nomor Peraturan</td>
                            <td>{{ $directory->nomor_peraturan }}</td>
                        </tr>
                        <tr>
                            <td>Tentang Peraturan</td>
                            <td>{{ $directory->tentang_peraturan }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Peraturan</td>
                            <td>{{ $directory->jenis_peraturan }}</td>
                        </tr>
                        <tr>
                            <td>Tahun Peraturan</td>
                            <td>{{ $directory->tahun_peraturan }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    @can('update', $directory)
                        <a href="{{ route('directories.edit', $directory) }}" id="edit-directory-{{ $directory->id }}" class="btn btn-warning">Ubah File</a>
                    @endcan
                    <a href="{{ route('directories.index') }}" class="btn btn-link">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
