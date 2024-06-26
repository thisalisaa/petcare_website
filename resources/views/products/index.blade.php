<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Daftar Produk</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Diskon (%)</th>
                <th>Harga Final</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- @foreach($products as $product)
                @if($product->categories->isEmpty())
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            @if($product->photo)
                                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" style="width: 100px;">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td colspan="4" class="text-center">Tidak ada kategori</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @else -->
                    @foreach($product->categories as $category)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                @if($product->photo)
                                <img src="{{ asset('storage/images/' . $product->photo) }}" style="width: 100px;">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>Rp{{ number_format($category->price, 2) }}</td>
                            <td>{{ $category->discount }}</td>
                            <td>Rp{{ number_format($category->final_price, 2) }}</td>
                            <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('products.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
