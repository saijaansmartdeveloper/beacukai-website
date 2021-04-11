@extends('layouts.admin')

@section('title', 'Ubah Media Link')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @if (request('action') == 'delete' && $kotabaruLink)
        @can('delete', $kotabaruLink)
            <div class="card">
                <div class="card-header">{{ __('kotabaru_link.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('kotabaru_link.title') }}</label>
                    <p>{{ $kotabaruLink->title_link }}</p>
                    <label class="form-label text-primary">{{ __('kotabaru_link.description') }}</label>
                    <p>{{ $kotabaruLink->description_link }}</p>
                    {!! $errors->first('kotabaru_link_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('kotabaru_link.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('kotabaru_links.destroy', $kotabaruLink) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="kotabaru_link_id" type="hidden" value="{{ $kotabaruLink->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('kotabaru_links.edit', $kotabaruLink) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <form method="POST" action="{{ route('kotabaru_links.update', $kotabaruLink) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="title_link" class="form-label">{{ __('kotabaru_link.title_link') }} <span class="form-required">*</span></label>
                        <input id="title_link" type="text" class="form-control{{ $errors->has('title_link') ? ' is-invalid' : '' }}" name="title_link" value="{{ old('title_link', $kotabaruLink->title_link) }}" required>
                        {!! $errors->first('title_link', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description_link" class="form-label">{{ __('kotabaru_link.description_link') }}</label>
                        <textarea id="description_link" class="form-control{{ $errors->has('description_link') ? ' is-invalid' : '' }}" name="description_link" rows="4">{{ old('description_link', $kotabaruLink->description_link) }}</textarea>
                        {!! $errors->first('description_link', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="external_link" class="form-label">Eksternal Link <span class="form-required">*</span></label>
                        <input id="external_link" type="text" class="form-control{{ $errors->has('external_link') ? ' is-invalid' : '' }}" name="external_link" value="{{ old('external_link', $kotabaruLink->external_link) }}" required>
                        {!! $errors->first('external_link', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="file" name="image_link">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{ __('kotabaru_link.update') }}" class="btn btn-success">
                        <a href="{{ route('kotabaru_links.show', $kotabaruLink) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                        @can('delete', $kotabaruLink)
                            <a href="{{ route('kotabaru_links.edit', [$kotabaruLink, 'action' => 'delete']) }}" id="del-kotabaru_link-{{ $kotabaruLink->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                        @endcan
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
