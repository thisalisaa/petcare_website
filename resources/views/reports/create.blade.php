@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-orange text-black">{{ __('Detail & Service') }}</div>

                <div class="card-body bg-white">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="nama_pet" class="col-md-4 col-form-label text-md-right">Nama Pet:</label>
                            <div class="col-md-6">
                                <input type="text" name="nama_pet" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama_owner" class="col-md-4 col-form-label text-md-right">Nama Owner:</label>
                            <div class="col-md-6">
                                <input type="text" name="nama_owner" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="temperatur" class="col-md-4 col-form-label text-md-right">Temperatur:</label>
                            <div class="col-md-6">
                                <input type="text" name="temperatur" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="grooming_service" class="col-md-4 col-form-label text-md-right">Grooming Service:</label>
                            <div class="col-md-6">
                                <input type="text" name="grooming_service" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggal_grooming" class="col-md-4 col-form-label text-md-right">Tanggal Grooming:</label>
                            <div class="col-md-6">
                                <input type="date" name="tanggal_grooming" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="kulit" class="col-md-4 col-form-label text-md-right">Kulit:</label>
                            <div class="col-md-6">
                                <select name="kulit" class="form-control" required>
                                    <option value="OK">OK</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="bulu" class="col-md-4 col-form-label text-md-right">Bulu:</label>
                            <div class="col-md-6">
                                <select name="bulu" class="form-control" required>
                                    <option value="OK">OK</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="telinga" class="col-md-4 col-form-label text-md-right">Telinga:</label>
                            <div class="col-md-6">
                                <select name="telinga" class="form-control" required>
                                    <option value="OK">OK</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="catatan" class="col-md-4 col-form-label text-md-right">Catatan:</label>
                            <div class="col-md-6">
                                <textarea name="catatan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-orange btn-block">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
