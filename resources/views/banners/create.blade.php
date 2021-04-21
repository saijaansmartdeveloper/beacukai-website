@extends('layouts.admin')

@section('title', 'Tambah Banner')

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
            <form method="POST" action="{{ route('banners.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Judul Banner <span class="form-required">*</span></label>
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title_banner" value="{{ old('title_banner') }}" required>
                        {!! $errors->first('title', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Keterangan Banner</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description_banner" rows="2">{{ old('description_banner') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="priority">Prioritas Urutan Ke-</label>
                        <input type="number" class="form-control" name="priority_banner" id="priority" min="1" value="1">
                    </div>
                    <div class="form-group">
                        <label for="is_active">Status Banner</label>
                        <select name="is_active_banner" id="is_active" class="form-control">
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image_banner" id="file" accept="image/*">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan Banner" class="btn btn-success">
                        <a href="{{ route('banners.index') }}" class="btn btn-link">Batal</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
