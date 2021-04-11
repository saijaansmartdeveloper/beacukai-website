@extends('layouts.admin')

@section('title', 'Detail Halaman')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td width="240px">Nama Halaman</td><td>{{ $page->name_page }}</td></tr>
                        <tr><td>Deskripsi Halaman</td><td>{{ $page->description_page }}</td></tr>
                        <tr><td colspan="2">Isi Halaman</td></tr>
                        <tr>
                            <td><img src="{{ asset('storage/' . $page->image_page) }}" alt="image {{$page->name_page}}" class="img-thumbnail"></td>
                            <td>{!! $page->content_page !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $page)
                    <a href="{{ route('pages.edit', $page) }}" id="edit-page-{{ $page->id }}" class="btn btn-warning">Ubah Halaman</a>
                @endcan
                <a href="{{ route('pages.index') }}" class="btn btn-link">Batal</a>
            </div>
        </div>
    </div>
</div>
@endsection
