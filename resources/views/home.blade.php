@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header">
                    <h4 class="h4">Jumlah Layanan</h4>
                </div>
                <div class="card-body">
                    <h3 class="m-0 p-0 text-body text-right">{{ $layanan ?? '0' }} Layanan</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header">
                    <h4 class="h4">Peraturan Bea Cukai</h4>
                </div>
                <div class="card-body">
                    <h3 class="m-0 p-0 text-body text-right">{{ $peraturan ?? '0' }} Peraturan</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header">
                    <h4 class="h4">Jumlah Berita</h4>
                </div>
                <div class="card-body">
                    <h3 class="m-0 p-0 text-body text-right">{{ $berita ?? '0' }} Berita</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-md-8 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header">
                    <h4 class="h4">Berita Terbaru</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tr>
                            <td>No</td>
                            <td>Judul Berita</td>
                            <td>Isi Berita</td>
                            <td>Tanggal Terbit</td>
                        </tr>
                        <tr>
                            @forelse($terbaru as $key => $item)
                                <td>{{$key++}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @empty
                                <td  colspan="4"><i>Berita Belum Dimasukan</i></td>
                            @endforelse
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header">
                    <h4 class="h4">Upload Peraturan Terbaru</h4>
                </div>
                <div class="card-body">
                    @forelse($direktori as $key => $item)

                    @empty
                        <i>Peraturan Belum Dimasukan</i>
                    @endforelse
                </div>
            </div>
        </div>
@endsection
