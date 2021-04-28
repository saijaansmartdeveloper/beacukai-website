@extends('layouts.admin')

@section('title', 'Daftar Post')

@section('content')
<div class="mb-3">
    <div>
        @can('create', new App\Models\Post)
            <a href="{{ route('posts.create') }}" class="btn btn-success">Tambah Post</a>
        @endcan
    </div>
    {{-- <h1 class="page-title">{{ __('post.list') }} <small>{{ __('app.total') }} : {{ $posts->total() }} {{ __('post.post') }}</small></h1> --}}
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('post.search') }}</label>
                        <input placeholder="{{ __('post.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('post.search') }}" class="btn btn-secondary">
                    <a href="{{ route('posts.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>

            <div class="card-body">
                <table class="table table-sm table-responsive-sm table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('post.title') }}</th>
                        <th>{{ __('post.description') }}</th>
                        <th>Prioritas</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $key => $post)
                        <tr>
                            <td class="text-center">{{ $posts->firstItem() + $key }}</td>
                            <td>{!! $post->title_link !!}</td>
                            <td>
                                {!! Str::limit(strip_tags($post->content_post), 200, '...') !!}
                            </td>
                            <td>{!! $post->priority !!}</td>
                            <td class="text-center">
                                @can('view', $post)
                                    <a href="{{ route('posts.show', $post) }}" id="show-post-{{ $post->id }}">{{ __('app.show') }}</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->appends(Request::except('page'))->render() }}
            </div>
        </div>
    </div>
</div>
@endsection
