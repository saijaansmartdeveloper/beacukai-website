@extends('layouts.admin')

@section('title', "Detail Testimoni")

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td width="250px">Nama Pemberi Testimoni</td><td>{{ $testimoni->name_testimoni }}</td></tr>
                        <tr><td>Perusahaan Pemberi Testimoni</td><td>{{ $testimoni->company_testimoni }}</td></tr>
                        <tr><td>Testimoni</td><td>{{ $testimoni->testimoni }}</td></tr>
                    </tbody>
                </table>
                @can('update', $testimoni)
                    <a href="{{ route('testimonis.edit', $testimoni) }}" id="edit-testimoni-{{ $testimoni->id }}" class="btn btn-warning">Ubah Testimoni</a>
                @endcan
                <a href="{{ route('testimonis.index') }}" class="btn btn-link">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
