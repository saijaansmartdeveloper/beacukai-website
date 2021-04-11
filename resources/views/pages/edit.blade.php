@extends('layouts.admin')

@section('title', 'Ubah Halaman')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @if (request('action') == 'delete' && $page)
        @can('delete', $page)
            <div class="card">
                <div class="card-header">{{ __('page.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">Nama Halaman</label>
                    <p>{!! $page->title_link !!}</p>
                    <label class="form-label text-primary">Deskripsi Halaman</label>
                    <p>{{ $page->description_page }}</p>
                    {!! $errors->first('page_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('page.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('pages.destroy', $page) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="page_id" type="hidden" value="{{ $page->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('pages.edit', $page) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <form method="POST" action="{{ route('pages.update', $page) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="form-group">
                    <label for="name_page" class="form-label">Nama Halaman <span class="form-required">*</span></label>
                    <input id="name_page" type="text" class="form-control{{ $errors->has('name_page') ? ' is-invalid' : '' }}" name="name_page" value="{{ old('name_page', $page->name_page) }}" required>
                    {!! $errors->first('name_page', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label for="description_page" class="form-label">Deskripsi Halaman</label>
                    <textarea id="description_page" class="form-control{{ $errors->has('description_page') ? ' is-invalid' : '' }}" name="description_page" rows="2">{{ old('description_page', $page->description_page) }}</textarea>
                    {!! $errors->first('description_page', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label for="content_page" class="form-label">Isi Halaman</label>
                    <textarea id="content_page" class="form-control{{ $errors->has('content_page') ? ' is-invalid' : '' }}" name="content_page" rows="10">{{ old('content_page', $page->content_page) }}</textarea>
                    {!! $errors->first('content_page', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <div class="form-group">
                    <input type="file" name="image_page" />
                    {!! $errors->first('image_page', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <div class="form-group">
                    <input type="submit" value="Ubah Halaman" class="btn btn-success">
                    <a href="{{ route('pages.show', $page) }}" class="btn btn-link">Batal</a>
                    @can('delete', $page)
                        <a href="{{ route('pages.edit', [$page, 'action' => 'delete']) }}" id="del-page-{{ $page->id }}" class="btn btn-danger float-right">Hapus</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
