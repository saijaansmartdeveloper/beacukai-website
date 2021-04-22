@extends('layouts.admin')

@section('title', 'Detail Profil Instansi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td>Nama Instansi</td>
                            <td>{{ $footer->nama_instansi }}</td>
                        </tr>
                        <tr>
                            <td>Deksipsi</td>
                            <td>{{ $footer->deskripsi_instansi }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{ $footer->alamat_instansi }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $footer->email_instansi }}</td>
                        </tr>
                        <tr>
                            <td>Web</td>
                            <td>{{ $footer->web_instansi }}</td>
                        </tr>
                        <tr>
                            <td>No Hp</td>
                            <td>{{ $footer->telp_instansi }}</td>
                        </tr>
                        <tr>
                            <td>Maps</td>
                            <td>{!! $footer->maps_instansi !!}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    @can('update', $footer)
                        <a href="{{ route('footers.edit', $footer) }}" id="edit-footer-{{ $footer->id }}" class="btn btn-warning">Ubah Profil</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
