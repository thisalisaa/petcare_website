@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="jua-font">Reports</h2>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Button to add new report -->
    <div class="mb-3">
        <a href="{{ route('reports.create') }}" class="btn btn-white">
            <i class="fas fa-plus-circle"></i> Tambah Laporan
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Pet</th>
                <th>Nama Owner</th>
                <th>Temperatur</th>
                <th>Grooming Service</th>
                <th>Tanggal Grooming</th>
                <th>Kulit</th>
                <th>Bulu</th>
                <th>Telinga</th>
                <th>Catatan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->nama_pet }}</td>
                    <td>{{ $report->nama_owner }}</td>
                    <td>{{ $report->temperatur }}</td>
                    <td>{{ $report->grooming_service }}</td>
                    <td>{{ $report->tanggal_grooming }}</td>
                    <td>{{ $report->kulit }}</td>
                    <td>{{ $report->bulu }}</td>
                    <td>{{ $report->telinga }}</td>
                    <td>{{ $report->catatan }}</td>
                    <td>
                        <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
