@extends('layouts.admin')

@section('title', 'Ubah Post')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @if (request('action') == 'delete' && $post)
        @can('delete', $post)
            <div class="card">
                <div class="card-body">
                    <label class="form-label text-primary">Judul Post</label>
                    <p>{{ $post->title_post }}</p>
                    <label class="form-label text-primary">Deskripsi Post</label>
                    <p>{{ $post->description }}</p>
                    {!! $errors->first('post_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('post.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('posts.destroy', $post) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="post_id" type="hidden" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <form method="POST" action="{{ route('posts.update', $post) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Judul Post <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('title_post') ? ' is-invalid' : '' }}" name="title_post" value="{{ old('title_post', $post->title_post) }}" required>
                        {!! $errors->first('title_post', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Isi Post</label>
                        <textarea id="description" class="form-control{{ $errors->has('content_post') ? ' is-invalid' : '' }}" name="content_post" rows="8">{{ old('content_post', $post->content_post) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="file" name="image_post" id="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan Post" class="btn btn-success">
                        <a href="{{ route('posts.index') }}" class="btn btn-link">Batal</a>
                        @can('delete', $post)
                            <a href="{{ route('posts.edit', [$post, 'action' => 'delete']) }}" id="del-post-{{ $post->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                        @endcan
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection

@section('js')
<script src="{{ url('/node_modules/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
        selector:'textarea.content_post',
        width: 900,
        height: 300
    });
</script>
@endsection
