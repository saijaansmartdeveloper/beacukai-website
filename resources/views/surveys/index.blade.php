@extends('layouts.admin')

@section('title', "Daftar Survey")

@section('content')
<div class="mb-3">
    <div>
        @can('create', new App\Models\Survey)
            <a href="{{ route('surveys.create') }}" class="btn btn-success">Tambah Survey</a>
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('survey.search') }}</label>
                        <input placeholder="{{ __('survey.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('survey.search') }}" class="btn btn-secondary">
                    <a href="{{ route('surveys.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>{{ __('survey.title') }}</th>
                        <th>{{ __('survey.description') }}</th>
                        <th>Tahun Survey</th>
                        <th>Status</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surveys as $key => $survey)
                    <tr>
                        <td class="text-center">{{ $surveys->firstItem() + $key }}</td>
                        <td>{!! $survey->title_link !!}</td>
                        <td>{{ $survey->description_survey }}</td>
                        <td>{{ $survey->tahun_survey }}</td>
                        <td>{!! $survey->status !!}</td>
                        <td class="text-center">
                            @can('view', $survey)
                                <a href="{{ route('surveys.show', $survey) }}" id="show-survey-{{ $survey->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $surveys->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
