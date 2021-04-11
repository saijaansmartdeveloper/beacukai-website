@extends('layouts.admin')

@section('title', 'Ubah Survey')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @if (request('action') == 'delete' && $survey)
        @can('delete', $survey)
            <div class="card">
                <div class="card-body">
                    <label class="form-label text-primary">Nama Survey</label>
                    <p>{{ $survey->name_survey }}</p>
                    <label class="form-label text-primary">Deskripsi Survey</label>
                    <p>{{ $survey->description_survey }}</p>
                    {!! $errors->first('survey_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('survey.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('surveys.destroy', $survey) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="survey_id" type="hidden" value="{{ $survey->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('surveys.edit', $survey) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <form method="POST" action="{{ route('surveys.update', $survey) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_survey" class="form-label">Nama Survey<span class="form-required">*</span></label>
                        <input id="name_survey" type="text" class="form-control{{ $errors->has('name_survey') ? ' is-invalid' : '' }}" name="name_survey" value="{{ old('name_survey', $survey->name_survey) }}" required>
                        {!! $errors->first('name_survey', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description_survey" class="form-label">Deskripsi Survey</label>
                        <textarea id="description_survey" class="form-control{{ $errors->has('description_survey') ? ' is-invalid' : '' }}" name="description_survey" rows="4">{{ old('description_survey', $survey->description_survey) }}</textarea>
                        {!! $errors->first('description_survey', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="tahun_survey" class="form-label">Tahun Survey<span class="form-required">*</span></label>
                        <input id="tahun_survey" type="number" class="form-control{{ $errors->has('tahun_survey') ? ' is-invalid' : '' }}" name="tahun_survey" value="{{ old('tahun_survey', $survey->tahun_survey) }}" min="0" required>
                        {!! $errors->first('tahun_survey', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="is_active_survey" class="form-label">Status<span class="form-required">*</span></label>
                        <select id="is_active_survey" class="form-control{{ $errors->has('is_active_survey') ? ' is-invalid' : '' }}" name="is_active_survey">
                            <option value="0" selected={{$survey->is_active_survey == '0' ? 'selected' : ''}}>Tidak Aktif</option>
                            <option value="1" selected={{$survey->is_active_survey == '1' ? 'selected' : ''}}>Aktif</option>
                        </select>
                        {!! $errors->first('is_active_survey', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input id="file_survey" type="file"  name="file_survey" value="{{ old('file_survey') }}">
                        {!! $errors->first('file_survey', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{ __('survey.update') }}" class="btn btn-success">
                        <a href="{{ route('surveys.show', $survey) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                        @can('delete', $survey)
                            <a href="{{ route('surveys.edit', [$survey, 'action' => 'delete']) }}" id="del-survey-{{ $survey->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                        @endcan
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
