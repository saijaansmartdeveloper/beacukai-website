@extends('layouts.admin')

@section('title', 'Ubah Menu Siring')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @if (request('action') == 'delete' && $siring)
        @can('delete', $siring)
            <div class="card">
                <div class="card-header">{{ __('siring.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('siring.title') }}</label>
                    <p>{{ $siring->name_siring }}</p>
                    <label class="form-label text-primary">{{ __('siring.description') }}</label>
                    <p>{{ $siring->description_siring }}</p>
                    {!! $errors->first('siring_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('siring.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('sirings.destroy', $siring) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="siring_id" type="hidden" value="{{ $siring->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('sirings.edit', $siring) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <form method="POST" action="{{ route('sirings.update', $siring) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_siring" class="form-label">Nama Menu Siring <span class="form-required">*</span></label>
                        <input id="name_siring" type="text" class="form-control{{ $errors->has('name_siring') ? ' is-invalid' : '' }}" name="name_siring" value="{{ old('name_siring', $siring->name_siring) }}" required>
                        {!! $errors->first('name_siring', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description_siring" class="form-label">Deskripsi Menu Siring</label>
                        <textarea id="description_siring" class="form-control{{ $errors->has('description_siring') ? ' is-invalid' : '' }}" name="description_siring" rows="2">{{ old('description_siring', $siring->description_siring) }}</textarea>
                        {!! $errors->first('description_siring', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="link_siring" class="form-label">Link Menu Siring <span class="form-required">*</span></label>
                        <input id="link_siring" type="text" class="form-control{{ $errors->has('link_siring') ? ' is-invalid' : '' }}" name="link_siring" value="{{ old('link_siring', $siring->link_siring) }}" required>
                        {!! $errors->first('link_siring', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="icon_siring" class="form-label">Icon Siring <span class="form-required">*</span></label>
                        <input id="icon_siring" type="text" class="form-control{{ $errors->has('icon_siring') ? ' is-invalid' : '' }}" name="icon_siring" value="{{ old('icon_siring', $siring->icon_siring) }}" required>
                        {!! $errors->first('icon_siring', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="is_priority" class="form-label">Urutasn Prioritas <span class="form-required">*</span></label>
                        <input id="is_priority" type="number" class="form-control{{ $errors->has('is_priority') ? ' is-invalid' : '' }}" name="is_priority" value="{{ old('is_priority', $siring->is_priority) }}" required>
                        {!! $errors->first('is_priority', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Ubah Menu Siring" class="btn btn-success">
                        <a href="{{ route('sirings.show', $siring) }}" class="btn btn-link">Batal</a>
                        @can('delete', $siring)
                            <a href="{{ route('sirings.edit', [$siring, 'action' => 'delete']) }}" id="del-siring-{{ $siring->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                        @endcan
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
