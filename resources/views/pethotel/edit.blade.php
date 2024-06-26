<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .category {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Produk</h1>
        <form action="{{ route('pethotel.update', $pethotel->id) }}" method="POST" id="editForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $pethotel->id }}">
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $pethotel->nama_produk }}" required>
            </div>
            
            <div id="kategoriContainer">
                @foreach ($pethotel->kategori_hotel as $index => $kategori)
                <div class="category border p-3">
                    <h3>Kategori {{ $index + 1 }}</h3>
                    <input type="hidden" name="kategori[{{ $index }}][id]" value="{{ $kategori->id }}">
                    <div class="form-group">
                        <label for="kategori_{{ $index }}_nama">Nama Kategori:</label>
                        <input type="text" class="form-control" id="kategori_{{ $index }}_nama" name="kategori[{{ $index }}][nama_kategori]" value="{{ $kategori->nama_kategori }}" required>
                    </div>

                    <div class="form-group">
                        <label for="kategori_{{ $index }}_harga">Harga Kategori:</label>
                        <input type="number" class="form-control" id="kategori_{{ $index }}_harga" name="kategori[{{ $index }}][harga_kategori]" value="{{ $kategori->harga_kategori }}" required oninput="calculateTotal({{ $index }})">
                    </div>

                    <div class="form-group">
                        <label for="kategori_{{ $index }}_diskon">Diskon Kategori (%):</label>
                        <input type="number" class="form-control" id="kategori_{{ $index }}_diskon" name="kategori[{{ $index }}][diskon_kategori]" value="{{ $kategori->diskon_kategori }}" required oninput="calculateTotal({{ $index }})">
                    </div>

                    <div class="form-group">
                        <label for="kategori_{{ $index }}_total_harga">Total Harga Setelah Diskon:</label>
                        <input type="number" class="form-control" id="kategori_{{ $index }}_total_harga" name="kategori[{{ $index }}][total_harga]" value="{{ $kategori->total_harga }}" readonly>
                    </div>
                </div>
                @endforeach
            </div>

            <button type="button" class="btn btn-primary mb-3" onclick="addCategory()">Tambah Kategori</button><br><br>
            <button type="submit" class="btn btn-primary mb-3">Simpan Perubahan</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        let categoryCount = {{ count($pethotel->kategori_hotel) }};

        function addCategory() {
            const categoryContainer = document.getElementById('kategoriContainer');
            const newCategory = document.createElement('div');
            newCategory.classList.add('category', 'border', 'p-3');

            newCategory.innerHTML = `
                <h3>Kategori ${categoryCount + 1}</h3>
                <div class="form-group">
                    <label for="kategori_${categoryCount}_nama">Nama Kategori:</label>
                    <input type="text" class="form-control" id="kategori_${categoryCount}_nama" name="kategori[${categoryCount}][nama_kategori]" required>
                </div>

                <div class="form-group">
                    <label for="kategori_${categoryCount}_harga">Harga Kategori:</label>
                    <input type="number" class="form-control" id="kategori_${categoryCount}_harga" name="kategori[${categoryCount}][harga_kategori]" required oninput="calculateTotal(${categoryCount})">
                </div>

                <div class="form-group">
                    <label for="kategori_${categoryCount}_diskon">Diskon Kategori (%):</label>
                    <input type="number" class="form-control" id="kategori_${categoryCount}_diskon" name="kategori[${categoryCount}][diskon_kategori]" required oninput="calculateTotal(${categoryCount})">
                </div>

                <div class="form-group">
                    <label for="kategori_${categoryCount}_total_harga">Total Harga Setelah Diskon:</label>
                    <input type="number" class="form-control" id="kategori_${categoryCount}_total_harga" name="kategori[${categoryCount}][total_harga]" readonly>
                </div>
            `;

            categoryContainer.appendChild(newCategory);
            categoryCount++;
        }

        function calculateTotal(index) {
            const price = parseFloat(document.getElementById(`kategori_${index}_harga`).value);
            const discount = parseFloat(document.getElementById(`kategori_${index}_diskon`).value);
            const totalHarga = document.getElementById(`kategori_${index}_total_harga`);

            if (!isNaN(price) && !isNaN(discount)) {
                const discountedPrice = price - (price * discount / 100);
                totalHarga.value = discountedPrice.toFixed(2);
            } else {
                totalHarga.value = '';
            }
        }

        @foreach ($pethotel->kategori_hotel as $index => $kategori)
            calculateTotal({{ $index }});
        @endforeach
    </script>
</body>
</html>
