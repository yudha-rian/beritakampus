<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h2 class="mb-4">Tambah Buku Baru</h2>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label>Judul Buku</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="author" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stock" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Pilih Kategori (Tekan Ctrl + Klik untuk pilih banyak)</label>
                <select name="category_ids[]" class="form-select" multiple required style="height: 150px;">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Buku</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>