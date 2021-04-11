@extends('layouts.admin')

@section('title', 'Ubah Banner')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (request('action') == 'delete' && $banner)
            @can('delete', $banner)
                <div class="card">
                    <div class="card-body">
                        <label class="form-label text-primary">{{ __('banner.title') }}</label>
                        <p>{{ $banner->title_banner }}</p>
                        <label class="form-label text-primary">{{ __('banner.description') }}</label>
                        <p>{{ $banner->description_banner }}</p>
                        {!! $errors->first('banner_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <hr style="margin:0">
                    <div class="card-body text-danger">Apakah anda yakin ingin menghapus?</div>
                    <div class="card-footer">
                        <form method="POST" action="{{ route('banners.destroy', $banner) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                            {{ csrf_field() }} {{ method_field('delete') }}
                            <input name="banner_id" type="hidden" value="{{ $banner->id }}">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <a href="{{ route('banners.edit', $banner) }}" class="btn btn-link">Batal</a>
                    </div>
                </div>
            @endcan
            @else
            <form method="POST" action="{{ route('banners.update', $banner) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}  {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Judul Banner <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title_banner" value="{{ old('title_banner', $banner->title_banner) }}" required>
                        {!! $errors->first('title_banner', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Keterangan Banner</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description_banner" rows="2">{{ old('description_banner', $banner->description_banner) }}</textarea>
                        {!! $errors->first('description_banner', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="priority">Prioritas Urutan Ke-</label>
                        <input type="number" class="form-control" name="priority_banner" id="priority" min="1" value="{{ old('priority_banner', $banner->priority_banner) }}" >
                    </div>
                    <div class="form-group">
                        <label for="is_active">Status Banner</label>
                        <select name="is_active_banner" id="is_active" class="form-control">
                            <option value="0" selected={{$banner == '0' ? 'selected' : ''}}>Tidak Aktif</option>
                            <option value="1" selected={{$banner == '1' ? 'selected' : ''}}>Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image_banner" id="file" accept="image/*">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan Banner" class="btn btn-success">
                        <a href="{{ route('banners.index') }}" class="btn btn-link">Batal</a>
                        @can('delete', $banner)
                            <a href="{{ route('banners.edit', [$banner, 'action' => 'delete']) }}" id="del-banner-{{ $banner->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                        @endcan
                    </div>
                </div>

            </form>
            @endif
        </div>
    </div>
</div>
@endsection
