<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3>Detail Buku: {{ $book->title }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Penulis:</strong> {{ $book->author }}</p>
                <p><strong>Stok Saat Ini:</strong> {{ $book->stock }}</p>
                <p><strong>Kategori:</strong> 
                    @foreach($book->categories as $cat)
                        <span class="badge bg-secondary">{{ $cat->name }}</span>
                    @endforeach
                </p>
            </div>
        </div>

        <h4>Riwayat Peminjaman</h4>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                @forelse($book->loans as $loan)
                <tr>
                    <td>{{ $loan->user->name }}</td>
                    <td>{{ $loan->loan_date }}</td>
                    <td>{{ $loan->return_date ?? 'Belum Kembali' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Belum ada yang meminjam buku ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">&laquo; Kembali ke Daftar</a>
    </div>
</body>
</html>