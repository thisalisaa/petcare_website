@extends('products.layout')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mt-5">
    <div class="card bg-yellow">
        <div class="card-header">
            <h1 class="card-title">Tambah Produk</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Produk:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Foto Produk:</label>
                    <input type="file" class="form-control" name="photo" @error('photo') is-invalid @enderror>
                    @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                <div id="categories-container">
                    <div class="category-item">
                        <h5>Kategori:</h5>
                        <div class="form-group">
                            <label for="category_name">Nama Kategori:</label>
                            <input type="text" class="form-control" name="categories[0][name]" required>
                        </div>
                        <div class="form-group">
                            <label for="category_price">Harga:</label>
                            <input type="number" step="0.01" class="form-control category-price" name="categories[0][price]" required>
                        </div>
                        <div class="form-group">
                            <label for="category_discount">Diskon (%):</label>
                            <input type="number" class="form-control category-discount" name="categories[0][discount]" required>
                        </div>
                        <div class="form-group">
                            <label for="category_final_price">Harga Akhir:</label>
                            <input type="number" step="0.01" class="form-control category-final-price" name="categories[0][final_price]" readonly>
                        </div>
                    </div>
                </div>
                <button type="button" id="add-category" class="btn btn-secondary btn-yellow">Tambah Kategori</button>
                <button type="submit" class="btn btn-primary btn-yellow">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    let categoryIndex = 1;

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
@endsection
