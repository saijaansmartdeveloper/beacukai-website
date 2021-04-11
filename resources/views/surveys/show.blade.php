@extends('layouts.admin')

@section('title', 'Detail Survey')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Detail Survey</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>Nama Survey</td><td>{{ $survey->name_survey }}</td></tr>
                        <tr><td>Deskripsi Survey</td><td>{{ $survey->description_survey }}</td></tr>
                        <tr><td>Tahun Survey</td><td>{{ $survey->tahun_survey }}</td></tr>
                        <tr><td>Status Survey</td><td>{!! $survey->status !!}</td></tr>
                        <tr><td colspan="2"> <img src="{{ asset('storage/' . $survey->file_survey) }}" alt="" width="100%"> </td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $survey)
                    <a href="{{ route('surveys.edit', $survey) }}" id="edit-survey-{{ $survey->id }}" class="btn btn-warning">{{ __('survey.edit') }}</a>
                @endcan
                <a href="{{ route('surveys.index') }}" class="btn btn-link">{{ __('survey.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
