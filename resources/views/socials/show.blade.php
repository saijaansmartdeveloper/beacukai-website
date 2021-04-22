@extends('layouts.admin')

@section('title', "Detail Link Sosial")

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td>Nama Sosial</td>
                            <td>{{ $social->title_social }}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi Sosial</td>
                            <td>{{ $social->description_social }}</td>
                        </tr>
                        <tr>
                            <td>Icon Sosial</td>
                            <td>{!! $social->icon_social !!}</td>
                        </tr>
                        <tr>
                            <td>Link Sosial</td>
                            <td>{!! $social->link_social !!}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    @can('update', $social)
                    <a href="{{ route('socials.edit', $social) }}" id="edit-social-{{ $social->id }}" class="btn btn-warning">Ubah Link Media Sosial</a>
                @endcan
                <a href="{{ route('socials.index') }}" class="btn btn-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
