<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .category {
            margin-bottom: 15px;
        }
    </style>
    <script>
        let categoryCount = 0;

        function addCategory() {
            categoryCount++;
            const categoryContainer = document.getElementById('categoryContainer');

            const newCategory = document.createElement('div');
            newCategory.classList.add('category');

            newCategory.innerHTML = `
                <h3>Kategori ${categoryCount}</h3>
                <div class="mb-3">
                    <label for="kategori[${categoryCount - 1}][nama_kategori]" class="form-label">Nama Kategori:</label>
                    <input type="text" id="kategori[${categoryCount - 1}][nama_kategori]" name="kategori[${categoryCount - 1}][nama_kategori]" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="kategori[${categoryCount - 1}][harga_kategori]" class="form-label">Harga Kategori:</label>
                    <input type="number" id="kategori[${categoryCount - 1}][harga_kategori]" name="kategori[${categoryCount - 1}][harga_kategori]" class="form-control" required oninput="calculateTotal(${categoryCount - 1})">
                </div>

                <div class="mb-3">
                    <label for="kategori[${categoryCount - 1}][diskon_kategori]" class="form-label">Diskon Kategori (%):</label>
                    <input type="number" id="kategori[${categoryCount - 1}][diskon_kategori]" name="kategori[${categoryCount - 1}][diskon_kategori]" class="form-control" required oninput="calculateTotal(${categoryCount - 1})">
                </div>

                <div class="mb-3">
                    <label for="kategori[${categoryCount - 1}][total_harga]" class="form-label">Total Harga Setelah Diskon:</label>
                    <input type="number" id="kategori[${categoryCount - 1}][total_harga]" name="kategori[${categoryCount - 1}][total_harga]" class="form-control" readonly>
                </div>
            `;

            categoryContainer.appendChild(newCategory);
        }

        function calculateTotal(index) {
            const harga = document.getElementById(`kategori[${index}][harga_kategori]`).value;
            const diskon = document.getElementById(`kategori[${index}][diskon_kategori]`).value;
            const totalHarga = document.getElementById(`kategori[${index}][total_harga]`);

            if (harga && diskon) {
                const discountedPrice = harga - (harga * diskon / 100);
                totalHarga.value = discountedPrice.toFixed(2);
            } else {
                totalHarga.value = '';
            }
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            addCategory(); // Add the first category on page load
        });
    </script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Form Input Produk</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('pethotel.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" required>
            </div>
            
            <div id="categoryContainer">
                <!-- Categories will be added here dynamically -->
            </div>
            
            <button type="button" class="btn btn-primary" onclick="addCategory()">Tambah Kategori</button>
            <br><br>
            <input type="submit" value="Submit" class="btn btn-success">
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
