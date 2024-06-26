<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 5px;
            text-decoration: none;
            color: white;
        }
        .btn-add {
            background-color: #28a745;
        }
        .btn-edit {
            background-color: #ffc107;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1>Daftar Produk</h1>
    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <div class="btn-container">
        <a href="{{ route('pethotel.create') }}" class="btn btn-add">Tambah Produk</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Diskon</th>
                <th>Total Harga Setelah Diskon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pethotels as $pethotel)
                @if ($pethotel->kategori_hotel->isNotEmpty())
                    @foreach ($pethotel->kategori_hotel as $kategori)
                        <tr>
                            <td>{{ $pethotel->nama_produk }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td>{{ number_format($kategori->harga_kategori, 2) }}</td>
                            <td>{{ $kategori->diskon_kategori }}%</td>
                            <td>
                                @php
                                    $total_harga = $kategori->harga_kategori - ($kategori->harga_kategori * $kategori->diskon_kategori / 100);
                                @endphp
                                {{ number_format($total_harga, 2) }}
                            </td>
                            <td>
                                <a href="{{ route('pethotel.edit', [$pethotel->id, $kategori->id]) }}" class="btn btn-edit">Edit</a>
                                <form action="{{ route('pethotel.destroy', [$kategori->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            @empty
                <tr>
                    <td colspan="6">Tidak ada produk yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
