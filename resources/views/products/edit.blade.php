<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Produk</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="photo">Foto Produk:</label>
            @if($product->photo)
            <img src="{{ asset('storage/images/' . $product->photo) }}" alt="{{ $product->name }}" style="max-width: 200px;">
                <p>Tidak ada foto</p>
            @endif
            <input type="file" class="form-control-file mt-2" id="photo" name="photo">
        </div>
        <div id="categories-container">
            @foreach($product->categories as $index => $category)
                <div class="category-item">
                    <h5>Kategori:</h5>
                    <div class="form-group">
                        <label for="category_name">Nama Kategori:</label>
                        <input type="text" class="form-control" name="categories[{{ $index }}][name]" value="{{ $category->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="category_price">Harga:</label>
                        <input type="number" step="0.01" class="form-control category-price" name="categories[{{ $index }}][price]" value="{{ $category->price }}" required>
                    </div>
                    <div class="form-group">
                        <label for="category_discount">Diskon (%):</label>
                        <input type="number" class="form-control category-discount" name="categories[{{ $index }}][discount]" value="{{ $category->discount }}" required>
                    </div>
                    <div class="form-group">
                        <label for="category_final_price">Harga Akhir:</label>
                        <input type="number" step="0.01" class="form-control category-final-price" name="categories[{{ $index }}][final_price]" value="{{ $category->final_price }}" readonly>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" id="add-category" class="btn btn-secondary">Tambah Kategori</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    let categoryIndex = {{ count($product->categories) }};

    function updateFinalPrice(index) {
        const price = parseFloat($(`input[name='categories[${index}][price]']`).val()) || 0;
        const discount = parseFloat($(`input[name='categories[${index}][discount]']`).val()) || 0;
        const finalPrice = price - (price * discount / 100);
        $(`input[name='categories[${index}][final_price]']`).val(finalPrice.toFixed(2));
    }

    $('#add-category').click(function() {
        const categoryHtml = `
            <div class="category-item">
                <h5>Kategori:</h5>
                <div class="form-group">
                    <label for="category_name">Nama Kategori:</label>
                    <input type="text" class="form-control" name="categories[${categoryIndex}][name]" required>
                </div>
                <div class="form-group">
                    <label for="category_price">Harga:</label>
                    <input type="number" step="0.01" class="form-control category-price" name="categories[${categoryIndex}][price]" required>
                </div>
                <div class="form-group">
                    <label for="category_discount">Diskon (%):</label>
                    <input type="number" class="form-control category-discount" name="categories[${categoryIndex}][discount]" required>
                </div>
                <div class="form-group">
                    <label for="category_final_price">Harga Akhir:</label>
                    <input type="number" step="0.01" class="form-control category-final-price" name="categories[${categoryIndex}][final_price]" readonly>
                </div>
            </div>
        `;

        $('#categories-container').append(categoryHtml);

        $(`input[name='categories[${categoryIndex}][price]'], input[name='categories[${categoryIndex}][discount]']`).on('input', function() {
            updateFinalPrice(categoryIndex);
        });

        categoryIndex++;
    });

    $(document).on('input', '.category-price, .category-discount', function() {
        const index = $(this).attr('name').match(/\d+/)[0];
        updateFinalPrice(index);
    });
</script>
</body>
</html>
