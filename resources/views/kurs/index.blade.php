@extends('layouts.admin')

@section('title', 'Daftar Kurs')

@section('content')
<div class="mb-3">
    <div>
        @can('create', new App\Models\Kurs)
            <a href="{{ route('kurs.create') }}" class="btn btn-success">Tambah Kurs</a>
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('kurs.search') }}</label>
                        <input placeholder="{{ __('kurs.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('kurs.search') }}" class="btn btn-secondary">
                    <a href="{{ route('kurs.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-sm table-responsive-sm table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Mata Uang</th>
                        <th>Nilai Mata Uang</th>
                        <th>Perubahan</th>
                        <th>Tanggal Berlaku</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($kurs as $key => $kur)
                        <tr>
                            <td class="text-center">{{ $kurs->firstItem() + $key }}</td>
                            <td>{!! $kur->title_link !!}</td>
                            <td>{{ $kur->nilai }}</td>
                            <td>{!! $kur->status_up_down !!}</td>
                            <td>{{ $kur->tanggal_berlaku }}</td>
                            <td class="text-center">
                                @can('update', $kur)
                                    <a href="{{ route('kurs.edit', $kur) }}" id="edit-kurs-{{ $kur->id }}" class="btn btn-success">Ubah</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $kurs->appends(Request::except('page'))->render() }}
            </div>
        </div>
    </div>
</div>
@endsection
