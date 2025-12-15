<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Daftar Buku</h2>
            <a href="{{ route('books.create') }}" class="btn btn-success">+ Tambah Buku</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Jumlah Peminjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        @foreach($book->categories as $cat)
                            <span class="badge bg-secondary">{{ $cat->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $book->stock }}</td>
                    <td class="text-center">
                        <span class="badge bg-info text-dark">{{ $book->loans_count }} Kali</span>
                    </td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-primary">Lihat Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>