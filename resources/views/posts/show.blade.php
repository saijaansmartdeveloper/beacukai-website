@extends('layouts.admin')

@section('title', 'Detail Post')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-sm" style="width: 100%">
                    <tbody>
                        @if ($post->image_post != null || $post->image_post != '')
                        <tr>
                            <td colspan="2">
                                <img src="{{ url('storage/'.$post->image_post) }}" alt="" srcset="" style="max-width: 100%">
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td>Judul</td>
                            <td>{{ $post->title_post }}</td>
                        </tr>
                        <tr>
                            <td>Prioritas</td>
                            <td>{{ $post->priority }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Isi Post</td>
                        </tr>
                        <tr>
                            <td colspan="2">{!! $post->content_post !!}</td>
                        </tr>

                    </tbody>
                </table>
                <div class="form-group">
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post) }}" id="edit-post-{{ $post->id }}" class="btn btn-warning">Ubah Post</a>
                    @endcan
                    <a href="{{ route('posts.index') }}" class="btn btn-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
