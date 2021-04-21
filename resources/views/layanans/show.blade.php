@extends('layouts.admin')

@section('title', __('layanan.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td>Nama Layanan</td>
                            <td>{{ $layanan->nama_layanan }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Layanan</td>
                            <td>{{ $layanan->jenis_layanan }}</td>
                        </tr>
                        <tr>
                            <td>Waktu Layanan</td>
                            <td>{{ $layanan->waktu_layanan }}</td>
                        </tr>
                        <tr>
                            <td>Estimasi Layanan</td>
                            <td>{{ $layanan->estimasi_layanan }}</td>
                        </tr>
                        <tr>
                            <td>Biaya Layanan</td>
                            <td>{{ $layanan->biaya_layanan }}</td>
                        </tr>
                    </tbody>
                </table>
                @can('update', $layanan)
                    <a href="{{ route('layanans.edit', $layanan) }}" id="edit-layanan-{{ $layanan->id }}" class="btn btn-warning">Ubah Layanan</a>
                @endcan
                <a href="{{ route('layanans.index') }}" class="btn btn-link">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection
