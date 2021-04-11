@extends('layouts.admin')

@section('title', 'Detail Media Link')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>Nama Media Link</td><td>{{ $kotabaruLink->title_link }}</td></tr>
                        <tr><td>Deskripsi Media Link</td><td>{{ $kotabaruLink->description_link }}</td></tr>
                        <tr><td>Link Media</td><td>{{ $kotabaruLink->external_link }}</td></tr>
                        <tr>
                            <td colspan="2">
                                <img src="{{ asset('storage/' . $kotabaruLink->image_link) }}" alt="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $kotabaruLink)
                    <a href="{{ route('kotabaru_links.edit', $kotabaruLink) }}" id="edit-kotabaru_link-{{ $kotabaruLink->id }}" class="btn btn-warning">Ubah Detail</a>
                @endcan
                <a href="{{ route('kotabaru_links.index') }}" class="btn btn-link">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
