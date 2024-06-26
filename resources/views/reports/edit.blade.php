@extends('layouts.app')

@section('content')
<div class="card portrait-card white-card">
    <div class="card-body">
        <h2 class="jua-font">Edit Report</h2>
        <form action="{{ route('reports.update', $report->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="nama_pet" class="col-sm-3 col-form-label">Nama Pet:</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_pet" class="form-control" value="{{ $report->nama_pet }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_owner" class="col-sm-3 col-form-label">Nama Owner:</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_owner" class="form-control" value="{{ $report->nama_owner }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="temperatur" class="col-sm-3 col-form-label">Temperatur:</label>
                <div class="col-sm-9">
                    <input type="text" name="temperatur" class="form-control" value="{{ $report->temperatur }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="grooming_service" class="col-sm-3 col-form-label">Grooming Service:</label>
                <div class="col-sm-9">
                    <input type="text" name="grooming_service" class="form-control" value="{{ $report->grooming_service }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_grooming" class="col-sm-3 col-form-label">Tanggal Grooming:</label>
                <div class="col-sm-9">
                    <input type="date" name="tanggal_grooming" class="form-control" value="{{ $report->tanggal_grooming }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="kulit" class="col-sm-3 col-form-label">Kulit:</label>
                <div class="col-sm-9">
                    <select name="kulit" class="form-control" required>
                        <option value="OK" {{ $report->kulit == 'OK' ? 'selected' : '' }}>OK</option>
                        <option value="NO" {{ $report->kulit == 'NO' ? 'selected' : '' }}>NO</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="bulu" class="col-sm-3 col-form-label">Bulu:</label>
                <div class="col-sm-9">
                    <select name="bulu" class="form-control" required>
                        <option value="OK" {{ $report->bulu == 'OK' ? 'selected' : '' }}>OK</option>
                        <option value="NO" {{ $report->bulu == 'NO' ? 'selected' : '' }}>NO</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="telinga" class="col-sm-3 col-form-label">Telinga:</label>
                <div class="col-sm-9">
                    <select name="telinga" class="form-control" required>
                        <option value="OK" {{ $report->telinga == 'OK' ? 'selected' : '' }}>OK</option>
                        <option value="NO" {{ $report->telinga == 'NO' ? 'selected' : '' }}>NO</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="catatan" class="col-sm-3 col-form-label">Catatan:</label>
                <div class="col-sm-9">
                    <textarea name="catatan" class="form-control">{{ $report->catatan }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-orange btn-block">Update</button>
        </form>
    </div>
</div>
@endsection
